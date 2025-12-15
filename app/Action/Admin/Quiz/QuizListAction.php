<?php

namespace App\Action\Admin\Quiz;

use App\Core\Auth;
use App\Core\View;
use App\Domain\QuizRepository;
use App\Domain\QuestionRepository;

class QuizListAction
{
    public function __invoke()
    {
        // جلوگیری از دسترسی غیر ادمین
        if (!Auth::isAdmin()) {
            return View::redirect(View::baseUrl('/login'));
        }

        $repo = new QuizRepository();
        $quizzes = $repo->all();
        $qRepo = new QuestionRepository();

        foreach ($quizzes as &$q) {
            $q['real_count'] = $qRepo->countByQuiz($q['id']);
        }
        unset($q);

        return View::render('admin/quizzes/list.php', [
            'quizzes' => $quizzes
        ]);
    }
}
