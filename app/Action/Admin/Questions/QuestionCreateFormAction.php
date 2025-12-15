<?php

namespace App\Action\Admin\Questions;

use App\Core\Auth;
use App\Core\View;

class QuestionCreateFormAction
{
    public function __invoke()
    {
        if (!Auth::isAdmin()) View::redirect("/login");

        return View::render("admin/questions/create.php", [
            "quiz_id" => $_GET['quiz_id']
        ]);
    }
}
