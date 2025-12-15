<?php

namespace App\Action\Teacher\Quizzes;

use App\Core\View;
use App\Core\Auth;

class CreateFormAction
{
    public function __invoke(): bool|string
    {
        if (!Auth::isTeacher()) {
            View::redirect('/login');
        }

        return View::render('teacher/quizzes/create.php', [
            'user' => Auth::user()
        ]);
    }
}
