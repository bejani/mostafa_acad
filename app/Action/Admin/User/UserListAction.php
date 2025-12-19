<?php

namespace App\Action\Admin\User;

use App\Core\Auth;
use App\Core\View;
use App\Domain\UserRepository;
use App\Domain\UserSubjectRepository;
use App\Domain\SubjectRepository;

class UserListAction
{
    public function __invoke()
    {
        if (!Auth::isAdmin()) View::redirect("/login");

        $repo = new UserRepository();
        $users = $repo->all();

        $userSubjectRepo = new UserSubjectRepository();
        $subjectRepo = new SubjectRepository();

        foreach ($users as &$user) {
            $subjectIds = $userSubjectRepo->subjectsForUser($user['id']);
            $subjects = $subjectRepo->findByIds($subjectIds);
            $user['subjects'] = array_column($subjects, 'title');
        }

        return View::render("admin/users/list.php", [
            "users" => $users
        ]);
    }
}
