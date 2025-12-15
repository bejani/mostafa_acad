<?php

namespace App\Action\Teacher\Questions;

use App\Core\Auth;
use App\Core\View;

class QuestionCreateFormAction
{
    public function __invoke()
    {
        if (!Auth::isTeacher()) View::redirect("/login");

        return View::render("teacher/questions/create.php", [
            "quiz_id" => $_GET['quiz_id']
        ]);
    }
}
