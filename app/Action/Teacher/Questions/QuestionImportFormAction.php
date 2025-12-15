<?php

namespace App\Action\Teacher\Questions;

use App\Core\View;

class QuestionImportFormAction
{
    public function __invoke(): string
    {
        $quizId = $_GET['quiz_id'] ?? null;

        if (!$quizId) {
            return "quiz_id is required.";
        }

        return View::render('teacher/questions/import_text.php', [
            'quiz_id' => $quizId,
        ]);
    }
}
