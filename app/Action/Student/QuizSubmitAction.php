<?php

namespace App\Action\Student;

use App\Core\Auth;
use App\Core\View;
use App\Domain\AttemptRepository;
use App\Domain\QuestionRepository;

class QuizSubmitAction
{
    public function __invoke()
    {
        if (!Auth::isStudent()) {
            return View::redirect('/login');
        }

        $attemptId = $_POST['attempt_id'] ?? null;
        $quizId    = $_POST['quiz_id'] ?? null;

        if (!$attemptId || !$quizId) {
            die("Invalid submission.");
        }

        $userId        = Auth::id();
        $attemptRepo   = new AttemptRepository();
        $questionRepo  = new QuestionRepository();

        // کلید سشن حاوی ID سوالاتی که این دانش آموز برای این آزمون دیده است
        $sessionKey = "quiz_{$quizId}_user_{$userId}_questions";

        if (!isset($_SESSION[$sessionKey]) || !is_array($_SESSION[$sessionKey])) {
            die("Session expired or questions list not found. Please retake the quiz.");
        }

        $questionIds = $_SESSION[$sessionKey];

        $correct = 0;
        $wrong   = 0;

        foreach ($questionIds as $qid) {

            // گزینه‌های همین سؤال
            $options = $questionRepo->getOptions($qid);

            $postKey    = 'q' . $qid;
            $selectedId = $_POST[$postKey] ?? null;

            // پیدا کردن گزینه صحیح
            $correctOptionId = null;
            foreach ($options as $op) {
                if ((int)$op['is_correct'] === 1) {
                    $correctOptionId = (int)$op['id'];
                    break;
                }
            }

            $isCorrect = 0;
            if ($selectedId !== null && $correctOptionId !== null && (int)$selectedId === $correctOptionId) {
                $isCorrect = 1;
                $correct++;
            } else {
                $wrong++;
            }

            // ذخیره در attempt_answers
            $attemptRepo->saveAnswer(
                $attemptId,
                $qid,
                null,                       // answer_text برای تستی خالی
                json_encode([$selectedId]),
                $isCorrect
            );
        }

        // محاسبه درصد
        $total = count($questionIds);
        $score = $total > 0 ? round(($correct / $total) * 100, 2) : 0;

        // محاسبه مدت زمان
        $attempt   = $attemptRepo->find($attemptId);
        $duration  = 0;
        if ($attempt && !empty($attempt['started_at'])) {
            $start    = strtotime($attempt['started_at']);
            $duration = time() - $start;
        }

        // به‌روزرسانی رکورد attempt
        $attemptRepo->finish($attemptId, $score, $duration);

        // دیگر به این لیست نیازی نداریم
        unset($_SESSION[$sessionKey]);

        // هدایت به صفحه جزئیات تلاش
        return View::redirect('/student/results/attempt?attempt_id=' . $attemptId);
    }
}
