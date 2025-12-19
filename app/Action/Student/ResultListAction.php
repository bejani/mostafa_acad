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

        // محاسبه صحیح/غلط/بی‌پاسخ
        $correct = 0;
        $wrong   = 0;
        $blank   = 0;

        foreach ($answers as $a) {
            $selected = json_decode($a['selected_option_ids'], true)[0] ?? null;

            if ($selected === null) {
                $blank++;
            } elseif ((int)$a['is_correct'] === 1) {
                $correct++;
            } else {
                $wrong++;
            }
        }

        return View::render('student/results/single.php', [
            'attempt' => $attempt,
            'answers' => $answers,
            'correct_count' => $correct,
            'wrong_count'   => $wrong,
            'blank_count'   => $blank
        ], 'student'); // ✔✔✔ این هم مهم است
    }
}
