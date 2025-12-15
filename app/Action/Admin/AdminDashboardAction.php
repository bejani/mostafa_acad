<?php

namespace App\Action\Admin;

use App\Core\View;
use App\Core\Auth;

class AdminDashboardAction
{
    public function __invoke()
    {
        if (!Auth::isAdmin()) {
            View::redirect('/login');
        }

        return View::render('admin/dashboard.php', [
            'user' => Auth::user()
        ]);
    }
}