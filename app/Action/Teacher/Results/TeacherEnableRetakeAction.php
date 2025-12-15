<?php

namespace App\Action\Teacher\Results;

use App\Core\View;
use App\Core\Auth;
use App\Domain\QuizRepository;
use App\Domain\QuizUserLimitRepository;

class TeacherEnableRetakeAction
{
    public function __invoke(): bool|string
    {
        if (!Auth::isTeacher()) {
            View::redirect('/login');
        }

        $quizId    = (int)($_GET['quiz_id'] ?? 0);
        $userId    = (int)($_GET['user_id'] ?? 0);
        $teacherId = (int) Auth::user()['id'];

        $quizRepo = new QuizRepository();
        if (!$quizRepo->isOwnedBy($quizId, $teacherId)) {
            exit('دسترسی غیرمجاز');
        }

        $limitRepo = new QuizUserLimitRepository();
        $limitRepo->incrementMaxAttempts($quizId, $userId);

        View::redirect('/teacher/results');
        return true;
    }
}
