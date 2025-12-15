<?php

namespace App\Action\Admin\Subject;

use App\Core\Auth;
use App\Core\View;
use App\Domain\SubjectRepository;

class SubjectCreateAction
{
    public function __invoke()
    {
        if (!Auth::isAdmin()) {
            return View::redirect(View::baseUrl('/login'));
        }

        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            return View::redirect('/admin/subjects/create');
        }

        $title = trim($_POST['title'] ?? '');
        $grade = trim($_POST['grade'] ?? '');
        $major = trim($_POST['major'] ?? '');
        $code  = trim($_POST['code'] ?? '');

        if ($title === '') {
            return View::redirect('/admin/subjects/create');
        }

        $repo = new SubjectRepository();
        $repo->create([
            'title' => $title,
            'grade' => $grade,
            'major' => $major,
            'code'  => $code,
        ]);

        return View::redirect('/admin/subjects');
    }
}