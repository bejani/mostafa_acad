<?php

namespace App\Action\Teacher\Quizzes;

use App\Core\View;
use App\Core\Auth;
use App\Domain\QuizRepository;

class CreateAction
{
    public function __invoke(): bool|string
    {
        if (!Auth::isTeacher()) {
            View::redirect('/login');
        }

        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            View::redirect('/teacher/quizzes/create');
        }

        $title = trim($_POST['title'] ?? '');
        if ($title === '') {
            exit('عنوان آزمون الزامی است');
        }

        $teacherId = (int) Auth::user()['id'];

        $repo = new QuizRepository();

        // فیلدها را مطابق جدول quizzes خودت تنظیم کن
        $quizId = $repo->create([
            'title' => $title,
            'created_by' => $teacherId,
            'is_published' => 0,
            'question_count' => (int)($_POST['question_count'] ?? 0),
            'time_limit_seconds' => (int)($_POST['time_limit_seconds'] ?? 0),
            'module' => trim($_POST['module'] ?? ''),
        ]);

        View::redirect('/teacher/quizzes');
        return true;
    }
}
