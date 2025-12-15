<?php

namespace App\Action\Student;

use App\Core\Auth;
use App\Core\View;
use App\Domain\AttemptRepository;

class ResultQuizListAction
{
    public function __invoke()
    {
        if (!Auth::isStudent()) return View::redirect('/login');

        $repo = new AttemptRepository();
        $userId = Auth::id();

        // گروه‌بندی تلاش‌ها بر اساس آزمون
        $quizzes = $repo->getUserQuizList($userId);

        return View::render('student/results/quizzes.php', [
            'quizzes' => $quizzes
        ], 'student');
    }
}
