<?php

namespace App\Action\Admin\Results;

use App\Core\Auth;
use App\Core\View;
use App\Domain\AttemptRepository;

class ResultListAction
{
    public function __invoke()
    {
        if (!Auth::isAdmin()) {
            return View::redirect('/login');
        }

        $attemptRepo = new AttemptRepository();

        return View::render('admin/results/index.php', [
            'rows' => $attemptRepo->allResultsSummary(),
        ]);
    }
}
