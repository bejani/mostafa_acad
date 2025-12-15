<?php

namespace App\Action\Student;

use App\Core\Auth;
use App\Core\View;
use App\Domain\AttemptRepository;

class ResultAttemptsAction
{
    public function __invoke()
    {
        if (!Auth::isStudent()) return View::redirect('/login');

        $quizId = $_GET['quiz_id'] ?? null;
        if (!$quizId) die("Invalid quiz.");

        $repo = new AttemptRepository();
        $userId = Auth::id();

        $attempts = $repo->getAttemptsForQuiz($userId, $quizId);

        return View::render('student/results/attempts.php', [
            'attempts' => $attempts
        ], 'student');
    }
}
