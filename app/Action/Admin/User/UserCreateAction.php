<?php

namespace App\Action\Admin\User;

use App\Core\View;
use App\Core\Auth;
use App\Domain\UserRepository;

class UserCreateAction
{
    public function __invoke()
    {
        if (!Auth::isAdmin()) View::redirect("/login");

        $name     = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role     = $_POST['role'];

        $hash = password_hash($password, PASSWORD_BCRYPT);

        $repo = new UserRepository();
        $repo->create([
            "name" => $name,
            "username" => $username,
            "password_hash" => $hash,
            "role" => $role,
            "is_active" => 1
        ]);

        View::redirect("/admin/users");
    }
}