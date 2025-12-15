<?php

namespace App\Action\Admin\Questions;

use App\Domain\QuestionRepository;

class ImportFromTextStoreAction
{
    public function __invoke(): string
    {
        $input = json_decode(file_get_contents("php://input"), true);

        $quizId   = (int)($input['quiz_id'] ?? 0);
        $question = trim($input['question'] ?? '');
        $A        = trim($input['A'] ?? '');
        $B        = trim($input['B'] ?? '');
        $C        = trim($input['C'] ?? '');
        $D        = trim($input['D'] ?? '');
        $correct  = strtoupper(trim($input['correct'] ?? ''));

        if (!$quizId || !$question || !$A || !$B || !$C || !$D || !in_array($correct, ['A', 'B', 'C', 'D'])) {
            http_response_code(422);
            return "invalid inputs";
        }

        $repo = new QuestionRepository();

        // 1) ایجاد سؤال
        $questionId = $repo->insertQuestion([
            'quiz_id' => $quizId,
            'body'    => $question,
        ]);

        // 2) درج گزینه‌ها
        $repo->insertOption($questionId, $A, $correct === 'A');
        $repo->insertOption($questionId, $B, $correct === 'B');
        $repo->insertOption($questionId, $C, $correct === 'C');
        $repo->insertOption($questionId, $D, $correct === 'D');

        return "OK";
    }
}
