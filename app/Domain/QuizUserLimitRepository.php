<?php

namespace App\Domain;

use App\Core\Database;
use PDO;

class QuizUserLimitRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function incrementMaxAttempts(int $quizId, int $userId): void
    {
        $stmt = $this->db->prepare("
            INSERT INTO quiz_user_limits (quiz_id, user_id, max_attempts, is_enabled)
            VALUES (?, ?, 2, 1)
            ON DUPLICATE KEY UPDATE max_attempts = max_attempts + 1, is_enabled = 1
        ");
        $stmt->execute([$quizId, $userId]);
    }

    public function getMaxAttempts(int $quizId, int $userId): int
    {
        $stmt = $this->db->prepare("
            SELECT max_attempts
            FROM quiz_user_limits
            WHERE quiz_id=? AND user_id=? AND is_enabled=1
            LIMIT 1
        ");
        $stmt->execute([$quizId, $userId]);
        $v = $stmt->fetchColumn();
        return $v ? (int)$v : 1; // پیش‌فرض: فقط 1 بار
    }
}
