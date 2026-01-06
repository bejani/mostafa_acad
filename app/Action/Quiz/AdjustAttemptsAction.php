<?php

namespace App\Action\Quiz;

use App\Core\Auth;
use App\Core\View;
use App\Domain\QuizRepository;

class AdjustAttemptsAction
{
    public function __invoke()
    {
        if (!Auth::check() || (!Auth::isAdmin() && !Auth::isTeacher())) {
            View::redirect('/login');
        }

        $quizId = (int)($_GET['quiz_id'] ?? 0);
        $op = $_GET['op'] ?? '';

        if ($quizId <= 0 || !in_array($op, ['inc', 'dec'], true)) {
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
        if ($op === 'inc') {
            $new = $current + 1;
        } else { // dec
            $new = max(1, $current - 1);
        }

        $repo->setMaxAttempts($quizId, $new);

        // redirect back
        $back = $_SERVER['HTTP_REFERER'] ?? (Auth::isAdmin() ? View::baseUrl('/admin/quizzes') : View::baseUrl('/teacher/quizzes'));
        header('Location: ' . $back);
        exit;
    }
}
