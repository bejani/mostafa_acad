<?php

namespace App\Action\Teacher\Quizzes;

use App\Core\Auth;
use App\Core\View;
use App\Domain\QuizRepository;

class QuizEditFormAction
{
    public function __invoke()
    {
        // فقط ادمین دسترسی دارد
        if (!Auth::isTeacher()) {
            return View::redirect(View::baseUrl('/login'));
        }

        // دریافت شناسه آزمون
        $id = (int)($_GET['id'] ?? 0);
        if ($id <= 0) {
            return View::redirect(View::baseUrl('/teacher/quizzes'));
        }

        // دریافت اطلاعات آزمون
        $repo = new QuizRepository();
        $quiz = $repo->find($id);

        if (!$quiz) {
            return View::redirect(View::baseUrl('/teacher/quizzes'));
        }

        // ماژول‌ها (مطابق enum دیتابیس)
        $modules = [
            'ICDL_Concepts' => 'مفاهیم پایه ICDL',
            'Windows'       => 'Windows',
            'Word'          => 'Word',
            'Excel'         => 'Excel',
            'PowerPoint'    => 'PowerPoint',
            'Access'        => 'Access',
            'Internet'      => 'Internet',
        ];

        // ارسال به ویو
        return View::render('teacher/quizzes/edit.php', [
            'quiz'    => $quiz,
            'modules' => $modules,
        ]);
    }
}
