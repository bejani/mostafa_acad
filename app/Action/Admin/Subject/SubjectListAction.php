<?php

namespace App\Action\Admin\Subject;

use App\Core\Auth;
use App\Core\View;
use App\Domain\SubjectRepository;

class SubjectListAction
{
    public function __invoke()
    {
        if (!Auth::isAdmin()) {
            return View::redirect(View::baseUrl('/login'));
        }

        $repo     = new SubjectRepository();
        $subjects = $repo->all();

        return View::render('admin/subjects/list.php', [
            'subjects' => $subjects,
        ]);
    }
}
