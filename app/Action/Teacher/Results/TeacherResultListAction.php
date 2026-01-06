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

        // Reuse the admin results table template but render within the teacher layout
        return View::render('admin/results/list.php', [
            'user' => Auth::user(),
            'rows' => $attemptRepo->teacherResultsSummary($teacherId),
        ], 'teacher');
    }
}
