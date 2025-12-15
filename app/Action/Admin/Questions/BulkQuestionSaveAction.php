<?php

namespace App\Action\Admin\Questions;

use App\Domain\QuestionRepository;
use App\Core\View;

class BulkQuestionSaveAction
{
    public function __invoke()
    {
        $quiz_id = (int)($_POST['quiz_id'] ?? 0);
        if ($quiz_id <= 0) exit("آزمون معتبر نیست");

        $input = trim($_POST['bulk_question'] ?? '');
        if ($input === "") exit("متن سؤال خالی است.");

        $lines = array_filter(array_map('trim', explode("\n", $input)));

        $question = array_shift($lines);

        $options = [];
        $answer = null;

        foreach ($lines as $line) {

            // گزینه‌ها
            if (preg_match('/^(الف|ب|ج|د)\)?\s*(.*)$/u', $line, $m)) {
                $options[$m[1]] = trim($m[2]);
            }

            // پاسخ
            if (preg_match('/پاسخ\s*[:：]?\s*(\S+)/u', $line, $m)) {
                $answer = $m[1];
            }
        }

        if (count($options) !== 4 || !$answer) {
            exit("ساختار گزینه‌ها یا پاسخ صحیح نیست.");
        }

        $map = ['ا' => 'A', 'الف' => 'A', 'ب' => 'B', 'ج' => 'C', 'د' => 'D'];
        $ansStd = $map[$answer] ?? null;

        $repo = new QuestionRepository();

        $qid = $repo->create([
            'quiz_id' => $quiz_id,
            'type' => 'mcq_single',
            'body' => $question,
            'explanation' => '',
            'difficulty' => 2
        ]);

        $eng = ['A', 'B', 'C', 'D'];
        $fa  = ['الف', 'ب', 'ج', 'د'];

        for ($i = 0; $i < 4; $i++) {
            $repo->addOption(
                $qid,
                $options[$fa[$i]],
                ($eng[$i] === $ansStd) ? 1 : 0
            );
        }

        return View::render("admin/questions/import_result.php", [
            'count' => 1,
            'quiz_id' => $quiz_id
        ]);
    }
}
