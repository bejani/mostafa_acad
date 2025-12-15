<?php

namespace App\Action\Teacher\Questions;

use App\Core\View;

class QuestionImportPreviewAction
{
    public function __invoke()
    {
        if (empty($_FILES['docx']['tmp_name'])) {
            exit("⚠️ فایل Word ارسال نشده است.");
        }

        $quiz_id = (int)($_POST['quiz_id'] ?? 0);
        if ($quiz_id <= 0) exit("❌ آزمون معتبر نیست.");

        $file = $_FILES['docx']['tmp_name'];

        // -------------------------------
        // 1) استخراج XML از فایل docx
        // -------------------------------
        $zip = new \ZipArchive();
        if ($zip->open($file) !== true) {
            exit("❌ خطا در باز کردن docx");
        }

        $xml = $zip->getFromName("word/document.xml");
        $zip->close();

        if (!$xml) exit("❌ فایل Word معتبر نیست.");

        // -------------------------------
        // 2) گرفتن همه‌ی w:t ها و merge کردن
        // -------------------------------
        preg_match_all('/<w:t[^>]*>(.*?)<\/w:t>/u', $xml, $matches);
        $parts = array_map(fn($x) => trim(html_entity_decode($x)), $matches[1]);

        $merged = [];
        $buffer = "";

        foreach ($parts as $p) {

            if ($p === "") continue;

            // اگر فقط "الف" یا "ب" یا "ج" یا "د" بود
            if (preg_match('/^(الف|ب|ج|د)$/u', $p)) {

                // بستن آیتم قبلی
                if ($buffer !== "") {
                    $merged[] = trim($buffer);
                    $buffer = "";
                }

                // شروع گزینه جدید
                $buffer = $p . " ";
            }
            // اگر پاسخ بود
            elseif (preg_match('/^پاسخ/u', $p)) {
                if ($buffer !== "") {
                    $merged[] = trim($buffer);
                    $buffer = "";
                }
                $merged[] = $p;
            }
            // اگر پایان سؤال
            elseif (preg_match('/[؟?]$/u', $p)) {
                if ($buffer !== "") {
                    $merged[] = trim($buffer);
                    $buffer = "";
                }
                $merged[] = $p;
            }
            // ادامه متن
            else {
                $buffer .= " " . $p;
            }
        }

        if ($buffer !== "") {
            $merged[] = trim($buffer);
        }

        // حذف خالی‌ها
        $lines = array_values(array_filter($merged));


        // -------------------------------
        // 3) تبدیل lines به ساختار سؤال
        // -------------------------------
        $questions = [];
        $i = 0;
        $N = count($lines);

        $letters = ['الف', 'ب', 'ج', 'د'];

        while ($i < $N) {

            $line = $lines[$i];

            // تشخیص شروع سؤال
            if (!preg_match('/[؟?]$/u', $line)) {
                $i++;
                continue;
            }

            $q = [
                'body' => $line,
                'options' => [],
                'answer' => null
            ];

            $i++;

            // گزینه‌ها
            foreach ($letters as $fa) {
                if ($i >= $N) continue;

                if (preg_match('/^' . $fa . '\)?\s*(.*)$/u', $lines[$i], $m)) {
                    $q['options'][$fa] = trim($m[1]);
                    $i++;
                }
            }

            // پاسخ
            if ($i < $N && preg_match('/پاسخ\s*[:：]?\s*([ابجد])/u', $lines[$i], $m)) {
                $q['answer'] = $m[1];
                $i++;
            }

            if (count($q['options']) === 4 && $q['answer']) {
                $questions[] = $q;
            }
        }

        $_SESSION['import_preview'] = $questions;
        $_SESSION['import_quiz_id'] = $quiz_id;

        return View::render("teacher/questions/import_preview.php", [
            'questions' => $questions,
            'quiz_id' => $quiz_id
        ]);
    }
}
