<?php

namespace App\Action\Teacher\Results;

use App\Core\View;
use App\Core\Auth;
use App\Domain\AttemptRepository;
use App\Domain\UserSubjectRepository;

class TeacherResultListAction
{
    public function __invoke(): bool|string
    {
        if (!Auth::isTeacher()) {
            View::redirect('/login');
        }

        $attemptRepo = new AttemptRepository();
        $subjects = (new UserSubjectRepository())->subjectsForUser((int)Auth::id());

        return View::render('teacher/results/index.php', [
            'user' => Auth::user(),
            'rows' => $attemptRepo->teacherResultsBySubjects($subjects),
        ], 'teacher');
    }
}
