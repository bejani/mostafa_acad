<?php

namespace App\Action\Student;

use App\Core\Auth;
use App\Core\View;
use App\Domain\QuizRepository;
use App\Domain\UserSubjectRepository;

class QuizListAction
{
    public function __invoke()
    {
        if (!Auth::isStudent()) {
            return View::redirect('/login');
        }

        $repo = new QuizRepository();
        $subjectIds = (new UserSubjectRepository())->subjectsForUser((int)Auth::id());
        $quizzes = $repo->allPublishedBySubjects($subjectIds);

        return View::render('student/quizzes/list.php', [
            'quizzes' => $quizzes,
            'student' => Auth::user()
        ], 'student'); // ← layout student
    }
}
