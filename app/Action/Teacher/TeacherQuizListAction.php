<?php

namespace App\Action\Teacher;

use App\Core\View;
use App\Core\Auth;
use PDO;
use App\Domain\QuizRepository;

class TeacherQuizListAction
{
    public function __invoke()
    {
        if (!Auth::isTeacher()) {
            View::redirect('/login');
        }


        $quizRepo  = new QuizRepository();
        $teacherId =  (int) Auth::user()['id'];


        $quizzes = $quizRepo->findByCreator($teacherId);

        return View::render('teacher/quizzes.php', [
            'user'    => Auth::user(),
            'quizzes' => $quizzes
        ]);
    }
}
