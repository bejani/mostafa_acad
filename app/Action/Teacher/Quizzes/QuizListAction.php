<?php

namespace App\Action\Teacher\Quiz;

use App\Core\Auth;
use App\Core\View;
use App\Domain\QuizRepository;
use App\Domain\QuestionRepository;

class QuizListAction
{
    public function __invoke()
    {
        // جلوگیری از دسترسی غیر ادمین
        if (!Auth::isTeacher()) {
            return View::redirect(View::baseUrl('/login'));
        }

        $repo = new QuizRepository();
        $quizzes = $repo->all();
        $qRepo = new QuestionRepository();

        foreach ($quizzes as &$q) {
            $q['real_count'] = $qRepo->countByQuiz($q['id']);
        }
        unset($q);

        return View::render('teacher/quizzes/list.php', [
            'quizzes' => $quizzes
        ]);
    }
}