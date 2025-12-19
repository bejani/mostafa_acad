<?php

namespace App\Action\Teacher;

use App\Core\View;
use App\Core\Auth;
use PDO;
use App\Domain\QuizRepository;
use App\Domain\UserSubjectRepository;

class TeacherQuizListAction
{
    public function __invoke()
    {
        if (!Auth::isTeacher()) {
            View::redirect('/login');
        }


        $quizRepo  = new QuizRepository();
        $subjectIds = (new UserSubjectRepository())->subjectsForUser((int)Auth::id());
        $quizzes = $quizRepo->findBySubjectIds($subjectIds);

        return View::render('teacher/quizzes.php', [
            'user'    => Auth::user(),
            'quizzes' => $quizzes
        ]);
    }
}
