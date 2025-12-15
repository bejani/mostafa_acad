<?php

namespace App\Action\Admin\Quiz;

use App\Core\Auth;
use App\Core\View;
use App\Domain\QuizRepository;

class QuizDeleteAction
{
    public function __invoke()
    {
        // جلوگیری از دسترسی غیر ادمین
        if (!Auth::isAdmin()) {
            return View::redirect('/login');
        }

        // دریافت id
        $id = (int)($_GET['id'] ?? 0);

        if ($id > 0) {
            $repo = new QuizRepository();
            $repo->delete($id);   // حذف آزمون (سوالات و attempt‌ها به‌صورت CASCADE حذف می‌شوند)
        }

        return View::redirect('/admin/quizzes');
    }
}