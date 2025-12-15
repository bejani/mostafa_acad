<?php

namespace App\Action\Admin\User;

use App\Core\View;
use App\Core\Auth;
use App\Domain\UserRepository;

class UserEditAction
{
    public function __invoke()
    {
        if (!Auth::isAdmin()) View::redirect("/login");

        $id       = $_POST['id'];
        $name     = $_POST['name'];
        $username = $_POST['username'];
        $role     = $_POST['role'];
        $is_active = $_POST['is_active'];

        $repo = new UserRepository();

        $repo->update($id, [
            "id" => $id,
            "name" => $name,
            "username" => $username,
            "role" => $role,
            "is_active" => $is_active
        ]);

        // اگر رمز جدید وارد شده بود → آپدیت کنیم
        if (!empty($_POST['password'])) {
            $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $repo->updatePassword($id, $hash);
        }

        View::redirect("/admin/users");
    }
}