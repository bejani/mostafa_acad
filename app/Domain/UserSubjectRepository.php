<?php

namespace App\Domain;

use App\Core\Database;
use PDO;

class UserSubjectRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    /**
     * Replace all subject assignments for a user.
     */
    public function sync(int $userId, array $subjectIds): void
    {
        $this->db->prepare("DELETE FROM user_subjects WHERE user_id = ?")->execute([$userId]);

        if (empty($subjectIds)) {
            return;
        }

        $stmt = $this->db->prepare("INSERT INTO user_subjects (user_id, subject_id) VALUES (?, ?)");
        foreach ($subjectIds as $sid) {
            $sid = (int)$sid;
            if ($sid > 0) {
                $stmt->execute([$userId, $sid]);
            }
        }
    }

    /**
     * Return subject ids assigned to a user.
     */
    public function subjectsForUser(int $userId): array
    {
        $stmt = $this->db->prepare("SELECT subject_id FROM user_subjects WHERE user_id = ?");
        $stmt->execute([$userId]);
        return array_map('intval', $stmt->fetchAll(PDO::FETCH_COLUMN));
    }

    /**
     * Return user ids assigned to a subject.
     */
    public function usersForSubject(int $subjectId): array
    {
        $stmt = $this->db->prepare("SELECT user_id FROM user_subjects WHERE subject_id = ?");
        $stmt->execute([$subjectId]);
        return array_map('intval', $stmt->fetchAll(PDO::FETCH_COLUMN));
    }
}
