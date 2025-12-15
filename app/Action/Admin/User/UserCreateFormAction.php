<?php

namespace App\Action\Admin\User;

use App\Core\View;
use App\Core\Auth;

class UserCreateFormAction
{
    public function __invoke()
    {
        if (!Auth::isAdmin()) View::redirect("/login");

        return View::render("admin/users/create.php");
    }
}