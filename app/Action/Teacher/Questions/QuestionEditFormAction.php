<?php

namespace App\Action\Teacher\Questions;

use App\Core\Auth;
use App\Core\View;
use App\Domain\QuestionRepository;
use App\Domain\QuizRepository;

class QuestionEditFormAction
{
    public function __invoke()
    {
        if (!Auth::isTeacher()) {
            return View::redirect('/login');
        }

        $id = (int)($_GET['id'] ?? 0);
        if ($id <= 0) {
            return View::redirect('/teacher/questions');
        }

        // دریافت سوال
        $qRepo = new QuestionRepository();
        $question = $qRepo->find($id);   // ← متد درست

        if (!$question) {
            return View::redirect('/teacher/questions');
        }

        // دریافت گزینه‌ها (در صورت نیاز)
        $options = $qRepo->findOptions($id);

        // دریافت اطلاعات آزمون مرتبط
        $quizRepo = new QuizRepository();
        $quiz = $quizRepo->find($question['quiz_id']);

        return View::render('teacher/questions/edit.php', [
            'question' => $question,
            'options'  => $options,
            'quiz'     => $quiz
        ]);
    }
}