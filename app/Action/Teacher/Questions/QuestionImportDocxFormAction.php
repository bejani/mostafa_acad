<?php

namespace App\Action\Teacher\Questions;

use App\Core\Auth;
use App\Core\View;
use App\Domain\QuizRepository;

class QuestionImportDocxFormAction
{
    public function __invoke()
    {
        if (!Auth::isTeacher()) {
            return View::redirect(View::baseUrl('/login'));
        }

        $quizId = (int)($_GET['quiz_id'] ?? 0);
        if ($quizId <= 0) {
            return View::redirect('/teacher/quizzes');
        }

        $quizRepo = new QuizRepository();
        $quiz     = $quizRepo->find($quizId);

        if (!$quiz) {
            return View::redirect('/teacher/quizzes');
        }

        // 🔹 ویوی جدا برای ورد تا با فرم متنی قاطی نشه
        return View::render('teacher/questions/import_docx.php', [
            'quiz' => $quiz,
        ]);
    }
}
