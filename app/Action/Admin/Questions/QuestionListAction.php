<?php

namespace App\Action\Admin\Questions;

use App\Core\Auth;
use App\Core\View;
use App\Domain\QuestionRepository;
use App\Domain\QuizRepository;

class QuestionListAction
{
    public function __invoke()
    {
        // فقط ادمین
        if (!Auth::isAdmin()) {
            return View::redirect('/login');
        }

        // دریافت quiz_id
        $quizId = (int)($_GET['quiz_id'] ?? 0);
        if ($quizId <= 0) {
            return View::redirect('/admin/quizzes');
        }

        // دریافت اطلاعات آزمون
        $quizRepo = new QuizRepository();
        $quiz = $quizRepo->find($quizId);

        if (!$quiz) {
            return View::redirect('/admin/quizzes');
        }

        // دریافت سؤالات آزمون (متد درست byQuiz)
        $qRepo = new QuestionRepository();
        $questions = $qRepo->byQuiz($quizId);

        return View::render("admin/questions/list.php", [
            "quiz"      => $quiz,
            "questions" => $questions
        ]);
    }
}
