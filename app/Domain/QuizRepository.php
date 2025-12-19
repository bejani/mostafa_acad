<?php

namespace App\Domain;

use App\Core\Database;
use PDO;

class QuizRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function all(): array
    {
        $stmt = $this->db->query("SELECT * FROM quizzes ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function allPublished(): array
    {
        $stmt = $this->db->query("SELECT * FROM quizzes WHERE is_published = 1 ORDER BY id DESC");
        return $stmt->fetchAll();
    }
    public function allPublishedBySubjects(array $subjectIds): array
    {
        if (empty($subjectIds)) {
            return [];
        }
        $placeholders = implode(',', array_fill(0, count($subjectIds), '?'));
        $stmt = $this->db->prepare("SELECT * FROM quizzes WHERE is_published = 1 AND subject_id IN ($placeholders) ORDER BY id DESC");
        $stmt->execute($subjectIds);
        return $stmt->fetchAll();
    }
    public function countPublished()
    {
        $db = Database::getConnection();
        return $db->query("SELECT COUNT(*) AS c FROM quizzes WHERE is_published = 1")
            ->fetch()['c'];
    }



    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM quizzes WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function create(array $data): int
    {
        $sql = "INSERT INTO quizzes 
            (title, subject_id, module, time_limit_seconds, question_count, is_published, max_attempts, created_by)
            VALUES 
            (:title, :subject_id, :module, :time_limit, :q_count, :published, :max_attempts, :created_by)";

        $stmt = $this->db->prepare($sql);   // یا هر روشی که در ریپوزیتوری‌هات استفاده می‌کنی

        $stmt->execute([
            'title'      => $data['title'],
            'subject_id' => $data['subject_id'],
            'module'     => $data['module'],
            'time_limit' => $data['time_limit_seconds'],
            'q_count'    => $data['question_count'],
            'published'  => $data['is_published'],
            'max_attempts' => $data['max_attempts'] ?? 1,
            'created_by' => $data['created_by'],
        ]);

        return (int)$this->db->lastInsertId();
    }


    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare(
            "UPDATE quizzes
             SET title=?, module=?, time_limit_seconds=?, question_count=?, is_published=?, max_attempts=?
             WHERE id=?"
        );

        return $stmt->execute([
            $data['title'],
            $data['module'],
            $data['time_limit_seconds'] ?? 0,
            $data['question_count'] ?? 0,
            $data['is_published'] ?? 0,
            $data['max_attempts'] ?? 1,
            $id,
        ]);
    }

    public function updateMaxAttempts(int $id, int $maxAttempts): bool
    {
        $stmt = $this->db->prepare("UPDATE quizzes SET max_attempts = ? WHERE id = ?");
        return $stmt->execute([$maxAttempts, $id]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM quizzes WHERE id=?");
        return $stmt->execute([$id]);
    }
    public function findByCreator(int $teacherId): array
    {
        $stmt = $this->db->prepare("
        SELECT id, title, created_at, is_published, question_count, time_limit_seconds, module
        FROM quizzes
        WHERE created_by = ?
        ORDER BY id DESC
    ");
        $stmt->execute([$teacherId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findBySubjectIds(array $subjectIds): array
    {
        if (empty($subjectIds)) {
            return [];
        }
        $placeholders = implode(',', array_fill(0, count($subjectIds), '?'));
        $stmt = $this->db->prepare("
            SELECT *
            FROM quizzes
            WHERE subject_id IN ($placeholders)
            ORDER BY id DESC
        ");
        $stmt->execute($subjectIds);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isOwnedBy(int $quizId, int $teacherId): bool
    {
        $stmt = $this->db->prepare("
        SELECT id
        FROM quizzes
        WHERE id = ? AND created_by = ?
        LIMIT 1
    ");
        $stmt->execute([$quizId, $teacherId]);
        return (bool)$stmt->fetchColumn();
    }

    public function isInSubjects(int $quizId, array $subjectIds): bool
    {
        if (empty($subjectIds)) {
            return false;
        }
        $placeholders = implode(',', array_fill(0, count($subjectIds), '?'));
        $stmt = $this->db->prepare("
            SELECT id FROM quizzes
            WHERE id = ? AND subject_id IN ($placeholders)
            LIMIT 1
        ");
        $params = array_merge([$quizId], $subjectIds);
        $stmt->execute($params);
        return (bool)$stmt->fetchColumn();
    }
}
