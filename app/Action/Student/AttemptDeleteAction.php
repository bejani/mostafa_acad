<?php

namespace App\Action\Student;

use App\Core\Auth;
use App\Core\View;
use App\Domain\AttemptRepository;

class AttemptDeleteAction
{
    public function __invoke()
    {
        if (!Auth::isStudent()) {
            return View::redirect('/login');
        }

        $attemptId = $_GET['attempt_id'] ?? null;
        if (!$attemptId) {
            die("Invalid attempt id.");
        }

        $repo = new AttemptRepository();
        $attempt = $repo->find($attemptId);

        if (!$attempt) {
            die("Attempt not found.");
        }

        // جلوگیری از حذف تلاش دیگران
        if ((int)$attempt['user_id'] !== Auth::id()) {
            die("Access denied.");
        }

        // حذف
        $repo->deleteAttempt($attemptId);

        // بازگشت به تلاش‌های همان آزمون
        return View::redirect('/student/results/quiz?quiz_id=' . $attempt['quiz_id']);
    }
}
