<?php

namespace App\Action\Admin\Subject;

use App\Core\Auth;
use App\Core\View;

class SubjectCreateFormAction
{
    public function __invoke()
    {
        if (!Auth::isAdmin()) {
            return View::redirect(View::baseUrl('/login'));
        }

        return View::render('admin/subjects/create.php', []);
    }
}
