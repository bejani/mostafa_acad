<?php

namespace App\Action\Admin\User;

use App\Core\View;
use App\Core\Auth;
use App\Domain\UserRepository;
use App\Domain\UserSubjectRepository;

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
        $userId = $repo->create([
            "name" => $name,
            "username" => $username,
            "password_hash" => $hash,
            "role" => $role,
            "is_active" => 1
        ]);

        // Assign subjects for students and teachers (if provided)
        if ($role === 'student' || $role === 'teacher') {
            $subjects = $_POST['subjects'] ?? [];
            if (!is_array($subjects)) {
                $subjects = [];
            }
            (new UserSubjectRepository())->sync((int)$userId, $subjects);
        }

        View::redirect("/admin/users");
    }
}
