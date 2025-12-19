<?php

namespace App\Action\Admin\User;

use App\Core\View;
use App\Core\Auth;
use App\Domain\SubjectRepository;

class UserCreateFormAction
{
    public function __invoke()
    {
        if (!Auth::isAdmin()) View::redirect("/login");

        $subjects = (new SubjectRepository())->all();

        return View::render("admin/users/create.php", [
            'subjects' => $subjects,
        ]);
    }
}
