<?php

namespace App\Action\Teacher\Quizzes;

use App\Core\Auth;
use App\Core\View;
use App\Domain\QuizRepository;
use App\Domain\UserSubjectRepository;

class QuizToggleRetakeAction
{
    public function __invoke()
    {
        if (!Auth::isTeacher()) {
            return View::redirect(View::baseUrl('/login'));
        }

        $quizId = $_GET['id'] ?? null;
        if (!$quizId) {
            die("Invalid quiz id");
        }

        $repo = new QuizRepository();
        $quiz = $repo->find($quizId);
        if (!$quiz) {
            die("Quiz not found");
        }

        // Check if quiz belongs to teacher (simplified check for now)
        // TODO: Implement proper subject-based access control when user_subjects is fully set up
        if ((int)$quiz['created_by'] !== (int)Auth::id()) {
            die("Access denied");
        }

        // Set max_attempts to next value (1, 2, 3, then back to 1)
        $currentValue = $quiz['max_attempts'] ?? 1;
        $newValue = $currentValue >= 3 ? 1 : $currentValue + 1;

        // Update only the max_attempts field
        $repo->updateMaxAttempts($quizId, $newValue);

        return View::redirect('/teacher/quizzes');
    }
}
