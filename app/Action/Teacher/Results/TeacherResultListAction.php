<?php

namespace App\Action\Teacher\Results;

use App\Core\View;
use App\Core\Auth;
use App\Domain\AttemptRepository;

class TeacherResultListAction
{
    public function __invoke(): bool|string
    {
        if (!Auth::isTeacher()) {
            View::redirect('/login');
        }

        $attemptRepo = new AttemptRepository();
        $teacherId   = (int) Auth::user()['id'];

        return View::render('teacher/results/index.php', [
            'user' => Auth::user(),
            'rows' => $attemptRepo->teacherResultsSummary($teacherId),
        ]);
    }
}
