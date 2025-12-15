<?php

namespace App\Action\Teacher\Questions;

use App\Core\Auth;
use App\Core\View;
use App\Domain\QuestionRepository;

class QuestionDeleteAction
{
    public function __invoke()
    {
        // جلوگیری از دسترسی غیر ادمین
        if (!Auth::isTeacher()) {
            return View::redirect('/login');
        }

        // دریافت و اعتبارسنجی ورودی‌ها
        $id     = (int)($_GET['id'] ?? 0);
        $quizId = (int)($_GET['quiz_id'] ?? 0);

        if ($id > 0) {
            $repo = new QuestionRepository();
            $repo->delete($id);
        }

        // بازگشت به لیست سوالات همان آزمون
        return View::redirect(
            '/teacher/questions&quiz_id=' . $quizId
        );
    }
}
