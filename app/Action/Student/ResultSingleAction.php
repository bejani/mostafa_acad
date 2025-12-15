<?php

namespace App\Action\Student;

use App\Core\Auth;
use App\Core\View;
use App\Domain\AttemptRepository;

class ResultSingleAction
{
    public function __invoke()
    {
        if (!Auth::isStudent()) {
            return View::redirect('/login');
        }

        $attemptId = $_GET['attempt_id'] ?? null;
        if (!$attemptId) die("Invalid attempt id");

        $userId = Auth::id();
        $repo   = new AttemptRepository();

        $attempt = $repo->find($attemptId);
        if (!$attempt || (int)$attempt['user_id'] !== (int)$userId) {
            die("Access denied.");
        }

        // گرفتن پاسخ‌ها (20 رکورد همان تلاش)
        $answers = $repo->getAnswersWithDetails($attemptId);

        // ترتیب اصلی سؤالات که در آزمون نمایش داده شدند
        $order = json_decode($attempt['question_order'], true);

        // تبدیل رکوردهای answers به map
        $map = [];
        foreach ($answers as $a) {
            $map[$a['question_id']] = $a;
        }

        // ساختن آرایه مرتب‌شده دقیقاً طبق ترتیب نمایش آزمون
        $orderedAnswers = [];
        foreach ($order as $qid) {
            if (isset($map[$qid])) {
                $orderedAnswers[] = $map[$qid];
            }
        }

        // محاسبه صحیح/غلط/بی‌پاسخ
        $correct = 0;
        $wrong   = 0;
        $blank   = 0;

        foreach ($orderedAnswers as $a) {
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
            'attempt'       => $attempt,
            'answers'       => $orderedAnswers,
            'correct_count' => $correct,
            'wrong_count'   => $wrong,
            'blank_count'   => $blank
        ], 'student');
    }
}
