<?php

namespace App\Action\Teacher\Questions;

use App\Core\Auth;
use App\Core\View;
use App\Domain\QuestionRepository;

class QuestionEditAction
{
    public function __invoke()
    {
        if (!Auth::isTeacher()) {
            return View::redirect('/login');
        }

        $id = (int)($_POST['id'] ?? 0);
        if ($id <= 0) {
            return View::redirect('/teacher/questions');
        }

        // جمع‌آوری داده‌ها
        $data = [
            'body'       => $_POST['body'] ?? '',
            'type'       => $_POST['type'] ?? 'single',
            'explanation' => $_POST['explanation'] ?? '',
            'difficulty' => $_POST['difficulty'] ?? 2,
        ];

        // آپدیت سؤال
        $qRepo = new QuestionRepository();
        $qRepo->update($id, $data);    // ← متد درست

        // برگشت به لیست سوالات همان آزمون
        $quizId = $_POST['quiz_id'] ?? 0;

        return View::redirect('/teacher/questions?quiz_id=' . $quizId);
    }
}