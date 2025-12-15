<?php

namespace App\Action\Teacher\Questions;

use App\Core\View;
use App\Domain\QuestionRepository;
use App\Domain\QuizRepository;
use ZipArchive;

class QuestionImportDocxAction
{
    public function __invoke()
    {
        $quiz_id = (int)($_GET['quiz_id'] ?? $_POST['quiz_id'] ?? 0);
        if ($quiz_id <= 0) exit('آزمون نامعتبر است.');

        // ===== مرحله ۲: ثبت در دیتابیس بعد از تایید =====
        if (isset($_POST['confirm']) && $_POST['confirm'] === '1') {

            $items = json_decode($_POST['items'] ?? '', true);
            if (!is_array($items)) exit('داده‌های تایید نامعتبر است.');

            $repo = new QuestionRepository();
            $inserted = 0;

            foreach ($items as $item) {
                $q = trim($item['question'] ?? '');
                $opts = $item['options'] ?? [];
                $ci = $item['correct_index'] ?? null;

                if ($q === '' || !is_array($opts) || count($opts) < 2 || $ci === null) {
                    continue;
                }

                $qid = $repo->create([
                    'quiz_id'     => $quiz_id,
                    'type'        => 'mcq_single',
                    'body'        => $q,
                    'explanation' => '',
                    'difficulty'  => 2,
                ]);

                foreach ($opts as $k => $t) {
                    $t = trim((string)$t);
                    if ($t === '') continue;
                    $repo->addOption($qid, $t, ($k == $ci) ? 1 : 0);
                }

                $inserted++;
            }

            return View::render('teacher/questions/import_result.php', [
                'count'   => $inserted,
                'quiz_id' => $quiz_id,
            ]);
        }

        // ===== مرحله ۱: خواندن فایل و پیش‌نمایش =====
        if (empty($_FILES['docx']['tmp_name'])) exit('هیچ فایل DOCX ارسال نشده است.');

        $lines = $this->extractLinesFromDocx($_FILES['docx']['tmp_name']);
        [$items, $warnings] = $this->parseStrictSimpleFormat($lines);

        $quizRepo = new QuizRepository();
        $quiz     = $quizRepo->find($quiz_id);

        return View::render('teacher/questions/import_docx_preview.php', [
            'quiz'       => $quiz,
            'quiz_id'    => $quiz_id,
            'items'      => $items,
            'items_json' => json_encode($items, JSON_UNESCAPED_UNICODE),
            'warnings'   => $warnings,
        ]);
    }

    private function extractLinesFromDocx(string $filePath): array
    {
        $zip = new \ZipArchive();
        if ($zip->open($filePath) !== true) {
            exit('خطا در خواندن فایل Word.');
        }

        $xml = $zip->getFromName('word/document.xml');
        $zip->close();

        if (!$xml) {
            exit('ساختار Word معتبر نیست.');
        }

        // فقط پایان پاراگراف و line-break را خط جدید کن
        $xml = str_replace(['</w:p>', '</w:br>'], "\n", $xml);

        // tab ها را به فاصله تبدیل کن
        $xml = str_replace('<w:tab/>', ' ', $xml);

        // متن خام
        $text = strip_tags($xml);

        // نرمال‌سازی خطوط
        $lines = array_map('trim', preg_split("/\R/u", $text));
        $lines = array_values(array_filter($lines, fn($l) => $l !== ''));

        // ادغام فاصله‌های اضافه
        $lines = array_map(function ($l) {
            $l = preg_replace('/\s+/u', ' ', $l);
            return trim($l);
        }, $lines);

        return $lines;
    }

    /**
     * فقط همین الگو را می‌پذیرد:
     * سؤال (1 خط)
     * گزینه‌ها (2 تا 4 خط) بدون هیچ پیشوند
     * خط آخر عدد 1..4 به عنوان پاسخ صحیح
     */
    private function parseStrictSimpleFormat(array $lines): array
    {
        $items = [];
        $warnings = [];

        $i = 0;
        $n = count($lines);

        while ($i < $n) {

            // ---- سؤال ----
            $question = trim($lines[$i] ?? '');
            $i++;

            if ($question === '') continue;

            // ---- گزینه‌ها تا قبل از خط عددی ----
            $options = [];

            while ($i < $n) {
                $line = trim($lines[$i]);

                // اگر خط فقط عدد 1..4 بود → پاسخ
                if ($this->isCorrectNumberLine($line)) {
                    break;
                }

                // گزینه
                $options[] = $line;
                $i++;
            }

            if (count($options) < 2) {
                $warnings[] = "سؤال «{$this->short($question)}» گزینه کافی ندارد.";
                continue;
            }

            if ($i >= $n) {
                $warnings[] = "برای سؤال «{$this->short($question)}» پاسخ (عدد 1..4) پیدا نشد.";
                break;
            }

            // ---- پاسخ ----
            $answerLine = trim($lines[$i]);
            $i++;

            $correctNum = (int)$answerLine;
            if ($correctNum < 1 || $correctNum > count($options)) {
                $warnings[] = "پاسخ سؤال «{$this->short($question)}» خارج از محدوده گزینه‌هاست.";
                continue;
            }

            $items[] = [
                'question'      => $question,
                'options'       => array_slice($options, 0, 4), // حداکثر 4 گزینه
                'correct_index' => $correctNum - 1,
            ];
        }

        return [$items, $warnings];
    }

    private function isCorrectNumberLine(string $line): bool
    {
        return preg_match('/^[1-4۱-۴]$/u', $line) === 1;
    }


    private function short(string $txt, int $len = 25): string
    {
        $txt = trim($txt);
        return (mb_strlen($txt, 'UTF-8') > $len)
            ? (mb_substr($txt, 0, $len, 'UTF-8') . '...')
            : $txt;
    }
}
