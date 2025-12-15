<?php

namespace App\Action\Admin\User;

use App\Core\View;
use App\Core\Auth;
use App\Domain\UserRepository;

class UserEditFormAction
{
    public function __invoke()
    {
        if (!Auth::isAdmin()) View::redirect("/login");

        $id = $_GET['id'];
        $repo = new UserRepository();
        $user = $repo->find($id);

        return View::render("admin/users/edit.php", [
            "user" => $user
        ]);
    }
}