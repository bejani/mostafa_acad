<?php

namespace App\Action\Teacher\Questions;

use App\Core\Auth;
use App\Core\View;
use App\Domain\QuestionRepository;

class QuestionCreateAction
{
    public function __invoke()
    {
        if (!Auth::isTeacher()) {
            return View::redirect('/login');
        }

        $quizId  = (int)($_POST['quiz_id'] ?? 0);
        $type    = trim($_POST['type'] ?? '');
        $body    = trim($_POST['body'] ?? '');
        $options = $_POST['options'] ?? [];
        $correct = $_POST['correct'] ?? []; // آرایه‌ای از indexهای صحیح

        if ($quizId <= 0 || $type === '' || $body === '') {
            return View::redirect('/teacher/questions?quiz_id=' . $quizId);
        }

        $repo = new QuestionRepository();

        // --- 1) ایجاد سؤال ---
        $questionId = $repo->create([
            'quiz_id'     => $quizId,
            'type'        => $type,
            'body'        => $body,
            'explanation' => '',
            'difficulty'  => 2
        ]);
        // --- 2) ایجاد گزینه‌ها ---
        foreach ($options as $i => $optText) {

            $optText = trim($optText);
            if ($optText === '') continue;

            // آیا این index صحیح است؟
            $isCorrect = in_array((string)$i, $correct, true) ? 1 : 0;

            $repo->addOption($questionId, $optText, $isCorrect);
        }

        // --- 3) بازگشت به لیست سؤالات ---
        return View::redirect(
            '/teacher/questions?quiz_id=' . $quizId
        );
    }
}
