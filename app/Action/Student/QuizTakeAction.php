<?php

namespace App\Action\Student;

use App\Core\Auth;
use App\Core\View;
use App\Domain\QuizRepository;
use App\Domain\AttemptRepository;
use App\Domain\QuestionRepository;

class QuizTakeAction
{
    public function __invoke()
    {
        if (!Auth::isStudent()) {
            return View::redirect('/login');
        }

        $quizId = $_GET['id'] ?? null;
        if (!$quizId) {
            die("Invalid quiz.");
        }

        $quizRepo      = new QuizRepository();
        $questionRepo  = new QuestionRepository();
        $attemptRepo   = new AttemptRepository();

        $quiz = $quizRepo->find($quizId);
        if (!$quiz) {
            die("Quiz not found.");
        }

        $userId = Auth::id();

        // تعداد سؤالات مجاز
        $limit = (int)$quiz['question_count'];
        if ($limit <= 0) $limit = 20;

        // گرفتن سوالات تصادفی
        $randomQuestions = $questionRepo->randomByQuiz($quizId, $limit);
        if (!$randomQuestions) {
            die("No questions found in this quiz.");
        }

        // استخراج IDها به ترتیب
        $questionIds = array_column($randomQuestions, 'id');

        // ذخیره attempt همراه ترتیب سؤالات
        $attemptId = $attemptRepo->create([
            'quiz_id'        => $quizId,
            'user_id'        => $userId,
            'score'          => 0,
            'duration_seconds' => 0,
            'question_order' => json_encode($questionIds)
        ]);

        // ذخیره در session برای مرحله submit
        $sessionKey = "quiz_{$quizId}_user_{$userId}_questions";
        $_SESSION[$sessionKey] = $questionIds;

        // ارسال به ویو
        return View::render('student/quizzes/take.php', [
            'quiz'       => $quiz,
            'questions'  => $randomQuestions,
            'attempt_id' => $attemptId
        ], 'student');
    }
}
