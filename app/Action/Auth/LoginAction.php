<?php

namespace App\Action\Auth;

use App\Core\Auth;
use App\Core\View;

class LoginAction
{
    public function __invoke()
    {
        if (Auth::check()) {
            if (Auth::isAdmin()) {
                return View::redirect('/admin/dashboard');
            }
            if (Auth::isStudent()) {
                return View::redirect('/student/dashboard');
            }
        }

        return View::render('auth/login.php', [
            'error' => $error ?? null,
        ], 'login');
    }
}
