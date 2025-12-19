<?php

namespace App\Action\Teacher\Quizzes;

use App\Core\Auth;
use App\Core\View;
use App\Domain\QuizRepository;

class QuizEditAction
{
    public function __invoke()
    {
        // جلوگیری از دسترسی غیر ادمین
        if (!Auth::isTeacher()) {
            return View::redirect(View::baseUrl('/login'));
        }

        // دریافت ورودی‌ها
        $id         = (int)($_POST['id'] ?? 0);
        $title      = trim($_POST['title'] ?? '');
        $module     = $_POST['module'] ?? 'Word';
        $timeLimit  = (int)($_POST['time_limit_seconds'] ?? 0);
        $qCount     = (int)($_POST['question_count'] ?? 20);
        $published  = isset($_POST['is_published']) ? 1 : 0;

        // اعتبارسنجی پایه
        if ($id <= 0 || $title === '') {
            return View::redirect(View::baseUrl('/teacher/quizzes'));
        }

        // بروزرسانی آزمون
        $repo = new QuizRepository();

        $repo->update($id, [
            'title'              => $title,
            'module'             => $module,
            'time_limit_seconds' => $timeLimit,
            'question_count'     => $qCount,
            'is_published'       => $published,
        ]);

        // هدایت به لیست آزمون‌ها
        return View::redirect(View::baseUrl('/teacher/quizzes'));
    }
}
