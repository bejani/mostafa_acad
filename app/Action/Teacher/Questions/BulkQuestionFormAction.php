<?php

namespace App\Action\Teacher\Questions;

use App\Core\View;

class BulkQuestionFormAction
{
    public function __invoke()
    {
        return View::render("teacher/questions/bulk_form.php");
    }
}
