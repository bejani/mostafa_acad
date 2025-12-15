<?php

namespace App\Action\Admin\User;

use App\Core\View;
use App\Core\Auth;
use App\Domain\UserRepository;

class UserDeleteAction
{
    public function __invoke()
    {
        if (!Auth::isAdmin()) View::redirect("/login");

        $id = $_GET['id'];

        $repo = new UserRepository();
        $repo->delete($id);

        View::redirect("/admin/users");
    }
}