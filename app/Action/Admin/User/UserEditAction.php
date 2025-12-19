<?php

namespace App\Action\Admin\User;

use App\Core\View;
use App\Core\Auth;
use App\Domain\UserRepository;
use App\Domain\UserSubjectRepository;

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
        $subjects = $_POST['subjects'] ?? [];

        // اگر نقش teacher نیست، درس‌ها را خالی کنیم
        if ($role !== 'teacher') {
            $subjects = [];
        }

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

        // آپدیت درس‌ها
        $userSubjectRepo = new UserSubjectRepository();
        $userSubjectRepo->sync($id, $subjects);

        View::redirect("/admin/users");
    }
}
