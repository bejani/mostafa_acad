<?php

namespace App\Action\Teacher\Quizzes;

use App\Domain\SubjectRepository;
use App\Core\Auth;
use App\Core\View;

class QuizCreateFormAction
{
    public function __invoke()
    {
        if (!Auth::isTeacher()) {
            return View::redirect(View::baseUrl('/login'));
        }

        $subjectRepo = new SubjectRepository();
        $allSubjects = $subjectRepo->all();

        // فقط دروس منتسب به معلم
        $userSubjectRepo = new \App\Domain\UserSubjectRepository();
        $teacherSubjectIds = $userSubjectRepo->subjectsForUser((int)Auth::id());
        $subjects = array_filter($allSubjects, function ($sub) use ($teacherSubjectIds) {
            return in_array($sub['id'], $teacherSubjectIds);
        });

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

        return View::render('teacher/quizzes/create.php', [
            'subjects' => $subjects,
            'modules'  => $modules,
        ]);
    }
}
