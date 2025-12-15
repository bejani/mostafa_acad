<?php

namespace App\Action\Student;

use App\Core\Auth;
use App\Core\View;
use App\Domain\UserRepository;

class ChangePasswordAction
{
    public function __invoke()
    {
        $user = Auth::user();
        $id = $user['id'];

        $current = $_POST['current_password'] ?? '';
        $new     = $_POST['new_password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';

        $repo = new UserRepository();
        $dbUser = $repo->findById($id);

        if (!password_verify($current, $dbUser['password_hash'])) {
            return View::render('student/change_password.php', [
                'error' => 'رمز فعلی اشتباه است'
            ], 'student');
        }

        if ($new !== $confirm) {
            return View::render('student/change_password.php', [
                'error' => 'رمز جدید و تکرار آن یکسان نیست'
            ], 'student');
        }

        $repo->updatePassword($id, password_hash($new, PASSWORD_BCRYPT));

        return View::render('student/change_password.php', [
            'success' => 'رمز عبور با موفقیت تغییر یافت.'
        ], 'student');
    }
}