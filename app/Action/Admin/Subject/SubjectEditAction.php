<?php

namespace App\Action\Admin\Subject;

use App\Core\Auth;
use App\Core\View;
use App\Domain\SubjectRepository;

class SubjectEditAction
{
    public function __invoke()
    {
        if (!Auth::isAdmin()) {
            return View::redirect(View::baseUrl('/login'));
        }

        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            return View::redirect('/admin/subjects');
        }

        $id    = (int)($_POST['id'] ?? 0);
        $title = trim($_POST['title'] ?? '');
        $grade = trim($_POST['grade'] ?? '');
        $major = trim($_POST['major'] ?? '');
        $code  = trim($_POST['code'] ?? '');

        if ($id <= 0 || $title === '') {
            return View::redirect('/admin/subjects');
        }

        $repo = new SubjectRepository();
        $repo->update($id, [
            'title' => $title,
            'grade' => $grade,
            'major' => $major,
            'code'  => $code,
        ]);

        return View::redirect('/admin/subjects');
    }
}
