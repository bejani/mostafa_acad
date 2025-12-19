<?php

namespace App\Action\Student;

use App\Core\Auth;
use App\Core\View;
use App\Domain\ContentRepository;
use App\Domain\QuizRepository;
use App\Domain\AttemptRepository;

class DashboardAction
{
    public function __invoke()
    {
        $user = Auth::user();
        $studentId = $user['id'];

        // شمارنده‌ها
        $quizCount    = (new QuizRepository())->countPublished();
        $resultCount  = (new AttemptRepository())->countByUser($studentId);

        return View::render("student/dashboard.php", [
            'title'        => 'داشبورد دانش آموز',
            'user'         => $user,
            'quizCount'    => $quizCount,
            'resultCount'  => $resultCount,
        ], 'student');
    }
}
