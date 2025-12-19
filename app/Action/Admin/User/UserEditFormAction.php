<?php

namespace App\Action\Admin\User;

use App\Core\View;
use App\Core\Auth;
use App\Domain\UserRepository;
use App\Domain\SubjectRepository;
use App\Domain\UserSubjectRepository;

class UserEditFormAction
{
    public function __invoke()
    {
        if (!Auth::isAdmin()) View::redirect("/login");

        $id = $_GET['id'];
        $repo = new UserRepository();
        $user = $repo->find($id);

        $subjectRepo = new SubjectRepository();
        $subjects = $subjectRepo->all();

        $userSubjectRepo = new UserSubjectRepository();
        $userSubjectIds = $userSubjectRepo->subjectsForUser($id);

        return View::render("admin/users/edit.php", [
            "user" => $user,
            "subjects" => $subjects,
            "userSubjectIds" => $userSubjectIds
        ]);
    }
}
