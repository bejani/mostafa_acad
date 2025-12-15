<?php

namespace App\Action\Admin\Questions;

use App\Core\View;
use App\Domain\QuestionRepository;

class QuestionImportConfirmAction
{
    public function __invoke()
    {
        if (empty($_SESSION['import_preview']) || empty($_SESSION['import_quiz_id'])) {
            exit("❌ پیش‌نمایش پیدا نشد.");
        }

        $quiz_id = $_SESSION['import_quiz_id'];
        $data = $_SESSION['import_preview'];

        unset($_SESSION['import_preview'], $_SESSION['import_quiz_id']);

        $repo = new QuestionRepository();
        $count = 0;

        $map = [
            'ا' => 'A',
            'الف' => 'A',
            'ب' => 'B',
            'ج' => 'C',
            'د' => 'D'
        ];

        foreach ($data as $q) {
            $qid = $repo->create([
                'quiz_id' => $quiz_id,
                'type' => 'mcq_single',
                'body' => $q['body'],
                'explanation' => '',
                'difficulty' => 2
            ]);

            $engLetters = ['A', 'B', 'C', 'D'];
            $idx = 0;

            foreach (['الف', 'ب', 'ج', 'د'] as $fa) {
                $repo->addOption(
                    $qid,
                    $q['options'][$fa],
                    ($engLetters[$idx] === $map[$q['answer']]) ? 1 : 0
                );
                $idx++;
            }

            $count++;
        }

        return View::render("admin/questions/import_result.php", [
            'count' => $count,
            'quiz_id' => $quiz_id
        ]);
    }
}
