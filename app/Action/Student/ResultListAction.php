<?php

namespace App\Action\Student;

use App\Core\Auth;
use App\Core\View;
use App\Domain\AttemptRepository;

class ResultListAction
{
    public function __invoke()
    {
        if (!Auth::isStudent()) return View::redirect('/login');

        $attemptRepo = new AttemptRepository();

        // اگر attempt ارسال نشده → لیست نتایج
        if (empty($_GET['attempt'])) {

            $attempts = $attemptRepo->getUserAttempts(Auth::id());

            return View::render('student/results/all.php', [
                'attempts' => $attempts
            ], 'student'); //  ✔✔✔ این مهم است
        }

        // اگر attempt ارسال شده → نمایش جزئیات
        $attemptId = $_GET['attempt'];
        $attempt = $attemptRepo->find($attemptId);

        if (!$attempt) {
            return "Attempt not found.";
        }

        $answers = $attemptRepo->getAnswersWithDetails($attemptId);

        return View::render('student/results/single.php', [
            'attempt' => $attempt,
            'answers' => $answers
        ], 'student'); // ✔✔✔ این هم مهم است
    }
}
