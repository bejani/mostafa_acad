<?php

namespace App\Action\Teacher\Quizzes;

use App\Core\Auth;
use App\Core\View;
use App\Domain\QuizRepository;
use App\Domain\QuestionRepository;
use App\Domain\UserSubjectRepository;

class QuizListAction
{
    public function __invoke()
    {
        // جلوگیری از دسترسی غیر ادمین
        if (!Auth::isTeacher()) {
            return View::redirect(View::baseUrl('/login'));
        }

        $repo = new QuizRepository();
        $subjectIds = (new UserSubjectRepository())->subjectsForUser((int)Auth::id());
        $quizzes = $repo->findBySubjectIds($subjectIds);
        $qRepo = new QuestionRepository();

        foreach ($quizzes as &$q) {
            $q['real_count'] = $qRepo->countByQuiz($q['id']);
        }
        unset($q);

        return View::render('teacher/quizzes.php', [
            'quizzes' => $quizzes,
            'user'    => Auth::user()
        ], 'teacher');
    }
}
