<?php

namespace App\Action\Admin\Subject;

use App\Core\Auth;
use App\Core\View;
use App\Domain\SubjectRepository;

class SubjectDeleteAction
{
    public function __invoke()
    {
        if (!Auth::isAdmin()) {
            return View::redirect(View::baseUrl('/login'));
        }

        $id = (int)($_GET['id'] ?? 0);
        if ($id <= 0) {
            return View::redirect('/admin/subjects');
        }

        $repo = new SubjectRepository();
        $repo->delete($id);

        return View::redirect('/admin/subjects');
    }
}
