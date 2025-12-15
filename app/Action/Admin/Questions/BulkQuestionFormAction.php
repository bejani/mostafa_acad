<?php

namespace App\Action\Admin\Questions;

use App\Core\View;

class BulkQuestionFormAction
{
    public function __invoke()
    {
        return View::render("admin/questions/bulk_form.php");
    }
}
