<?php

namespace App\Action\Student;

use App\Core\Auth;
use App\Core\View;
use App\Domain\QuizRepository;
use App\Domain\AttemptRepository;
use App\Domain\QuestionRepository;
use App\Domain\UserSubjectRepository;

class QuizTakeAction
{
    public function __invoke()
    {
        if (!Auth::isStudent()) {
            return View::redirect('/login');
        }

        $quizId = $_GET['id'] ?? null;
        if (!$quizId) {
            return View::render('error.php', [
                'title' => 'آزمون نامعتبر',
                'message' => 'شناسه آزمون مشخص نشده است.'
            ], 'student');
        }

        $quizRepo      = new QuizRepository();
        $questionRepo  = new QuestionRepository();
        $attemptRepo   = new AttemptRepository();

        $quiz = $quizRepo->find($quizId);
        if (!$quiz) {
            return View::render('error.php', [
                'title' => 'آزمون یافت نشد',
                'message' => 'آزمون مورد نظر وجود ندارد یا حذف شده است.'
            ], 'student');
        }

        $userId = Auth::id();

        // ensure quiz subject is allowed for this student
        $subjectIds = (new UserSubjectRepository())->subjectsForUser((int)$userId);
        if (!in_array((int)$quiz['subject_id'], $subjectIds, true)) {
            return View::render('error.php', [
                'title' => 'دسترسی غیرمجاز',
                'message' => 'شما اجازه دسترسی به این آزمون را ندارید.'
            ], 'student');
        }

        // چک کردن تعداد attempts قبلی
        $previousAttempts = $attemptRepo->getAttemptsForQuiz($userId, $quizId);
        $attemptCount = count($previousAttempts);

        // چک کردن حداکثر تعداد attempts مجاز
        $maxAttempts = (int)($quiz['max_attempts'] ?? 1);
        if ($attemptCount >= $maxAttempts) {
            return View::render('error.php', [
                'title' => 'محدودیت تعداد دفعات',
                'message' => "شما حداکثر {$maxAttempts} بار می‌توانید این آزمون را بدهید. تعداد دفعات فعلی شما: {$attemptCount}"
            ], 'student');
        }

        // تعداد سؤالات مجاز
        $limit = (int)$quiz['question_count'];
        if ($limit <= 0) $limit = 20;

        // گرفتن سوالات تصادفی
        $randomQuestions = $questionRepo->randomByQuiz($quizId, $limit);
        if (!$randomQuestions) {
            return View::render('error.php', [
                'title' => 'سوال یافت نشد',
                'message' => 'این آزمون هنوز سوالی ندارد. لطفاً با معلم خود تماس بگیرید.'
            ], 'student');
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
