<?php

namespace App\Action\Auth;

use App\Core\Auth;
use App\Core\View;
use App\Domain\UserRepository;



class DoLoginAction
{
    public function __invoke()
    {
        session_destroy();
        session_start();

        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if ($username === '' || $password === '') {
            return View::render('auth/login.php', [
                'error' => 'نام کاربری و رمز عبور نباید خالی باشند.'
            ]);
        }

        $repo = new UserRepository();
        $user = $repo->findByUsername($username);

        if (
            !$user ||
            empty($user['password_hash']) ||
            !password_verify($password, $user['password_hash'])
        ) {
            return View::render('auth/login.php', [
                'error' => 'نام کاربری یا رمز اشتباه است',
            ], 'login');
        }

        if (isset($user['is_active']) && $user['is_active'] == 0) {
            return View::render('auth/login.php', [
                'error' => 'حساب کاربری شما غیرفعال شده است.'
            ]);
        }

        session_regenerate_id(true);
        $_SESSION['user'] = $user;
        $_SESSION['last_activity'] = time();

        if ($user['role'] === 'admin') {
            return View::redirect('/admin/dashboard');
        }

        if ($user['role'] === 'student') {
            return View::redirect('/student/panel');
        }

        if ($user['role'] === 'teacher') {
            return View::redirect('/teacher/dashboard');
        }

        return View::redirect('/login');
    }
}
