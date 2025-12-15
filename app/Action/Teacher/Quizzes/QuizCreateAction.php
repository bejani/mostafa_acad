<?php

namespace App\Action\Teacher\Quiz;

use App\Core\Auth;
use App\Core\View;
use App\Domain\QuizRepository;

class QuizCreateAction
{
    public function __invoke()
    {
        // جلوگیری از دسترسی غیر ادمین
        if (!Auth::isTeacher()) {
            return View::redirect(View::baseUrl('/login'));
        }

        // فقط از طریق POST
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            return View::redirect('/teacher/quizzes/create');
        }

        // --- دریافت داده‌های فرم ---
        $title      = trim($_POST['title'] ?? '');
        $subjectId  = (int)($_POST['subject_id'] ?? 0);          // ⬅️ درس
        $module     = $_POST['module'] ?? 'Word';                // اگر فعلاً نگه می‌داری
        $timeLimit  = (int)($_POST['time_limit_seconds'] ?? 0);
        $qCount     = (int)($_POST['question_count'] ?? 20);
        $published  = isset($_POST['is_published']) ? 1 : 0;

        // --- اعتبارسنجی پایه ---
        if ($title === '' || $subjectId <= 0) {
            // می‌تونی اینجا پیام خطا هم توی سشن ذخیره کنی
            return View::redirect('/teacher/quizzes/create');
        }

        // --- ایجاد آزمون ---
        $repo = new QuizRepository();

        $repo->create([
            'title'              => $title,
            'subject_id'         => $subjectId,          // ⬅️ درس
            'module'             => $module,
            'time_limit_seconds' => $timeLimit,
            'question_count'     => $qCount,
            'is_published'       => $published,
            'created_by'         => Auth::user()['id'] ?? null,
        ]);

        // --- بازگشت به لیست ---
        return View::redirect('/teacher/quizzes');
    }
}
