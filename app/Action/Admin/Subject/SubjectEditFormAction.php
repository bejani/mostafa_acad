<?php

namespace App\Action\Admin\Subject;

use App\Core\Auth;
use App\Core\View;
use App\Domain\SubjectRepository;

class SubjectEditFormAction
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

        $repo    = new SubjectRepository();
        $subject = $repo->find($id);

        if (!$subject) {
            return View::redirect('/admin/subjects');
        }

        return View::render('admin/subjects/edit.php', [
            'subject' => $subject,
        ]);
    }
}
