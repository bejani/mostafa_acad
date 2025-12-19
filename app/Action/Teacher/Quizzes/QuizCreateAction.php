<?php

namespace App\Action\Teacher\Quizzes;

use App\Core\Auth;
use App\Core\View;
use App\Domain\QuizRepository;
use App\Domain\UserSubjectRepository;

class QuizCreateAction
{
    public function __invoke()
    {
        if (!Auth::isTeacher()) {
            return View::redirect(View::baseUrl('/login'));
        }

        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            return View::redirect('/teacher/quizzes/create');
        }

        // ورودی‌ها
        $title      = trim($_POST['title'] ?? '');
        $subjectId  = (int)($_POST['subject_id'] ?? 0);
        $module     = $_POST['module'] ?? 'Word';
        $timeLimit  = (int)($_POST['time_limit_seconds'] ?? 0);
        $qCount     = (int)($_POST['question_count'] ?? 20);
        $published  = isset($_POST['is_published']) ? 1 : 0;

        if ($title === '' || $subjectId <= 0) {
            return View::redirect('/teacher/quizzes/create');
        }

        // فقط دروس منتسب به معلم
        $subjectIds = (new UserSubjectRepository())->subjectsForUser((int)Auth::id());
        if (!in_array($subjectId, $subjectIds, true)) {
            return View::redirect('/teacher/quizzes/create');
        }

        $repo = new QuizRepository();

        $repo->create([
            'title'              => $title,
            'subject_id'         => $subjectId,
            'module'             => $module,
            'time_limit_seconds' => $timeLimit,
            'question_count'     => $qCount,
            'is_published'       => $published,
            'max_attempts'       => (int)($_POST['max_attempts'] ?? 1),
            'created_by'         => Auth::user()['id'] ?? null,
        ]);

        return View::redirect('/teacher/quizzes');
    }
}
