<?php

namespace App\Action\Student;

use App\Core\View;

class ChangePasswordFormAction
{
    public function __invoke()
    {
        return View::render('student/change_password.php', [
            'title' => 'تغییر رمز'
        ], 'student');
    }
}