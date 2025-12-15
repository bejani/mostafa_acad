<?php

namespace App\Action\Admin\Questions;

use App\Core\Auth;
use App\Core\View;
use App\Domain\QuestionRepository;
use App\Domain\QuizRepository;

class QuestionEditFormAction
{
    public function __invoke()
    {
        if (!Auth::isAdmin()) {
            return View::redirect('/login');
        }

        $id = (int)($_GET['id'] ?? 0);
        if ($id <= 0) {
            return View::redirect('/admin/questions');
        }

        // دریافت سوال
        $qRepo = new QuestionRepository();
        $question = $qRepo->find($id);   // ← متد درست

        if (!$question) {
            return View::redirect('/admin/questions');
        }

        // دریافت گزینه‌ها (در صورت نیاز)
        $options = $qRepo->findOptions($id);

        // دریافت اطلاعات آزمون مرتبط
        $quizRepo = new QuizRepository();
        $quiz = $quizRepo->find($question['quiz_id']);

        return View::render('admin/questions/edit.php', [
            'question' => $question,
            'options'  => $options,
            'quiz'     => $quiz
        ]);
    }
}
