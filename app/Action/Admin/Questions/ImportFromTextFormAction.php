<?php

namespace App\Action\Admin\Questions;

use App\Core\View;

class ImportFromTextFormAction
{
    public function __invoke(): string
    {
        $quizId = $_GET['quiz_id'] ?? null;

        if (!$quizId) {
            return "quiz_id is required";
        }

        return View::render('admin/questions/import_text.php', [
            'quiz_id' => $quizId
        ]);
    }
}
