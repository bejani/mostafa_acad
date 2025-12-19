<?php

namespace App\Action\Student;

use App\Core\Auth;
use App\Core\View;
use App\Domain\ContentRepository;

class StudentPanelAction
{
    public function __invoke()
    {
        // گرفتن اطلاعات کاربر
        $user = Auth::user();
        if (!Auth::isStudent()) {
            View::redirect('/login');
        }

        // گرفتن محتواهای منتشر شده
        // $repo = new ContentRepository();
        // $contents = $repo->allPublished();
        $contents = '';

        // رندر صفحه
        return View::render('student/dashboard.php', [
            'user' => $user,
            'contents' => $contents
        ], 'student');
    }
}
