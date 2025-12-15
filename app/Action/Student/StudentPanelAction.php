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

        // گرفتن محتواهای منتشر شده
        $repo = new ContentRepository();
        $contents = $repo->allPublished();

        // رندر صفحه
        return View::render('student/panel.php', [
            'user' => $user,
            'contents' => $contents
        ], 'student');
    }
}