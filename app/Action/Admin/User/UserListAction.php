<?php

namespace App\Action\Admin\User;

use App\Core\Auth;
use App\Core\View;
use App\Domain\UserRepository;

class UserListAction
{
    public function __invoke()
    {
        if (!Auth::isAdmin()) View::redirect("/login");

        $repo = new UserRepository();
        $users = $repo->all();

        return View::render("admin/users/list.php", [
            "users" => $users
        ]);
    }
}