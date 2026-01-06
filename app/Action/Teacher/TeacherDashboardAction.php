<?php

namespace App\Action\Teacher;

use App\Core\View;
use App\Core\Auth;

class TeacherDashboardAction
{
    public function __invoke()
    {
        if (!Auth::isTeacher()) {
            View::redirect('/login');
        }

        return View::render('teacher/dashboard.php', [
            'user' => Auth::user()
        ], 'teacher');
    }
}
