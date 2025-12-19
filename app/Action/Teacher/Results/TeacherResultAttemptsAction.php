<?php

namespace App\Action\Teacher\Results;

use App\Core\View;
use App\Core\Auth;
use App\Domain\QuizRepository;
use App\Domain\AttemptRepository;
use App\Domain\UserSubjectRepository;

class TeacherResultAttemptsAction
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
        $subjects = (new UserSubjectRepository())->subjectsForUser($teacherId);
        if (!$quizRepo->isInSubjects($quizId, $subjects)) {
            exit('دسترسی غیرمجاز به این آزمون.');
        }

        $attemptRepo = new AttemptRepository();

        return View::render('teacher/results/attempts.php', [
            'user'     => Auth::user(),
            'quiz'     => $quizRepo->find($quizId) ?? null,
            'attempts' => $attemptRepo->getAttemptsForUserQuiz($quizId, $userId),
        ], 'teacher');
    }
}
