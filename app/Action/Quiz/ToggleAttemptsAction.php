<?php

namespace App\Action\Quiz;

use App\Core\Auth;
use App\Core\View;
use App\Domain\QuizRepository;

class ToggleAttemptsAction
{
    public function __invoke()
    {
        if (!Auth::check() || (!Auth::isAdmin() && !Auth::isTeacher())) {
            View::redirect('/login');
        }

        $quizId = (int)($_GET['quiz_id'] ?? 0);
        if ($quizId <= 0) {
            View::redirect($_SERVER['HTTP_REFERER'] ?? '/');
        }

        $repo = new QuizRepository();

        // If teacher, ensure ownership
        if (Auth::isTeacher()) {
            $teacherId = (int)Auth::user()['id'];
            if (!$repo->isOwnedBy($quizId, $teacherId)) {
                exit('دسترسی غیرمجاز');
            }
        }

        $current = $repo->getMaxAttempts($quizId);
        $new = ($current > 1) ? 1 : 2; // toggle between 1 and 2
        $repo->setMaxAttempts($quizId, $new);

        // redirect back
        $back = $_SERVER['HTTP_REFERER'] ?? (Auth::isAdmin() ? View::baseUrl('/admin/quizzes') : View::baseUrl('/teacher/quizzes'));
        header('Location: ' . $back);
        exit;
    }
}
