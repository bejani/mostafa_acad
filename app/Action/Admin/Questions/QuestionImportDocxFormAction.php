<?php

namespace App\Action\Admin\Questions;

use App\Core\Auth;
use App\Core\View;
use App\Domain\QuizRepository;

class QuestionImportDocxFormAction
{
    public function __invoke()
    {
        if (!Auth::isAdmin()) {
            return View::redirect(View::baseUrl('/login'));
        }

        $quizId = (int)($_GET['quiz_id'] ?? 0);
        if ($quizId <= 0) {
            return View::redirect('/admin/quizzes');
        }

        $quizRepo = new QuizRepository();
        $quiz     = $quizRepo->find($quizId);

        if (!$quiz) {
            return View::redirect('/admin/quizzes');
        }

        // 🔹 ویوی جدا برای ورد تا با فرم متنی قاطی نشه
        return View::render('admin/questions/import_docx.php', [
            'quiz' => $quiz,
        ]);
    }
}
