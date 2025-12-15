<?php

namespace App\Action\Admin\Quiz;

use App\Domain\SubjectRepository;
use App\Core\Auth;
use App\Core\View;

class QuizCreateFormAction
{
    public function __invoke()
    {
        if (!Auth::isAdmin()) {
            return View::redirect(View::baseUrl('/login'));
        }

        $subjectRepo = new SubjectRepository();
        $subjects    = $subjectRepo->all();

        // ماژول‌های فعلی مطابق enum دیتابیس
        $modules = [
            'ICDL_Concepts' => 'مفاهیم پایه ICDL',
            'Windows'       => 'Windows',
            'Word'          => 'Word',
            'Excel'         => 'Excel',
            'PowerPoint'    => 'PowerPoint',
            'Access'        => 'Access',
            'Internet'      => 'Internet',
        ];

        return View::render('admin/quizzes/create.php', [
            'subjects' => $subjects,
            'modules'  => $modules,
        ]);
    }
}
