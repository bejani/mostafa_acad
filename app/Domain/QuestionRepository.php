<?php

namespace App\Domain;

use App\Core\Database;
use PDO;

class QuestionRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    // ============================================================
    //  CRUD — Questions
    // ============================================================

    /** ایجاد سؤال */
    public function create(array $data)
    {
        $stmt = $this->db->prepare("
            INSERT INTO questions (quiz_id, type, body, explanation, difficulty, created_at)
            VALUES (?, ?, ?, ?, ?, NOW())
        ");

        $stmt->execute([
            $data['quiz_id'],
            $data['type'],
            $data['body'],
            $data['explanation'] ?? '',
            $data['difficulty'] ?? 2
        ]);

        return $this->db->lastInsertId();
    }

    public function insertQuestion(array $data): int
    {
        $stmt = $this->db->prepare("
        INSERT INTO questions (quiz_id, type, body, explanation, difficulty, created_at)
        VALUES (?, ?, ?, ?, ?, NOW())
    ");

        $stmt->execute([
            $data['quiz_id'],
            $data['type'] ?? 'mcq_single',
            $data['body'],
            $data['explanation'] ?? '',
            $data['difficulty'] ?? 2
        ]);

        return (int)$this->db->lastInsertId();
    }


    public function insertOption(int $questionId, string $body, bool $isCorrect): bool
    {
        $stmt = $this->db->prepare("
        INSERT INTO options (question_id, body, is_correct)
        VALUES (?, ?, ?)
    ");

        return $stmt->execute([
            $questionId,
            $body,
            $isCorrect ? 1 : 0
        ]);
    }



    /** یافتن سؤال */
    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM questions WHERE id=?");
        $stmt->execute([$id]);
        $q = $stmt->fetch();

        if (!$q) return null;

        // افزودن گزینه‌های سؤال
        $q['options'] = $this->getOptions($id);

        return $q;
    }



    /** آپدیت سؤال */
    public function update($id, array $data)
    {
        $stmt = $this->db->prepare("
            UPDATE questions
            SET body=?, type=?, explanation=?, difficulty=?
            WHERE id=?
        ");
        return $stmt->execute([
            $data['body'],
            $data['type'],
            $data['explanation'] ?? '',
            $data['difficulty'] ?? 2,
            $id
        ]);
    }


    /** حذف سؤال */
    public function delete($id)
    {
        // اول حذف گزینه‌ها
        $this->deleteOptions($id);

        $stmt = $this->db->prepare("DELETE FROM questions WHERE id=?");
        return $stmt->execute([$id]);
    }

    // ============================================================
    //  Options
    // ============================================================

    /** گرفتن گزینه‌های سؤال */
    public function getOptions($questionId)
    {
        $stmt = $this->db->prepare("SELECT * FROM options WHERE question_id=?");
        $stmt->execute([$questionId]);
        return $stmt->fetchAll();
    }


    /** یافتن گزینه‌ها برای فرم ویرایش */
    public function findOptions($questionId)
    {
        return $this->getOptions($questionId);
    }


    /** افزودن گزینه */
    public function addOption($questionId, $body, $isCorrect)
    {
        $stmt = $this->db->prepare("
            INSERT INTO options (question_id, body, is_correct)
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([$questionId, $body, $isCorrect]);
    }

    public function randomByQuiz(int $quizId, int $limit): array
    {
        $stmt = $this->db->prepare("
        SELECT *
        FROM questions
        WHERE quiz_id = ?
        ORDER BY RAND()
        LIMIT ?
    ");
        $stmt->bindValue(1, $quizId, PDO::PARAM_INT);
        $stmt->bindValue(2, $limit, PDO::PARAM_INT);
        $stmt->execute();

        $questions = $stmt->fetchAll();

        // افزودن گزینه‌ها
        foreach ($questions as &$q) {
            $q['options'] = $this->getOptions($q['id']);
        }

        return $questions;
    }


    public function getByIds(array $ids)
    {
        if (empty($ids)) return [];

        $in = implode(',', array_fill(0, count($ids), '?'));

        $sql = "SELECT * FROM questions WHERE id IN ($in)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($ids);

        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // افزودن گزینه‌ها برای هر سوال
        foreach ($questions as &$q) {
            $q['options'] = $this->getOptions($q['id']);
        }

        return $questions;
    }

    /** حذف همه گزینه‌های سؤال */
    public function deleteOptions($questionId)
    {
        $stmt = $this->db->prepare("DELETE FROM options WHERE question_id=?");
        return $stmt->execute([$questionId]);
    }


    /** بررسی صحیح بودن گزینه */
    public function isCorrectOption($optionId)
    {
        $stmt = $this->db->prepare("SELECT is_correct FROM options WHERE id=?");
        $stmt->execute([$optionId]);
        $res = $stmt->fetch();
        return $res && $res['is_correct'] == 1;
    }

    // ============================================================
    //  Questions for a quiz
    // ============================================================

    /** تمام سؤالات یک آزمون */
    public function byQuiz($quizId)
    {
        $stmt = $this->db->prepare("SELECT * FROM questions WHERE quiz_id=? ORDER BY id ASC");
        $stmt->execute([$quizId]);

        $questions = $stmt->fetchAll();

        // افزودن گزینه‌ها
        foreach ($questions as &$q) {
            $q['options'] = $this->getOptions($q['id']);
        }

        return $questions;
    }

    // ============================================================
    //  Questions for an attempt
    // ============================================================

    /**
     *  گرفتن سؤالات مربوط به یک Attempt
     *  (براساس quiz_id موجود در attempts)
     */
    public function byAttempt($attemptId)
    {
        $stmt = $this->db->prepare("
            SELECT q.*
            FROM questions q
            JOIN attempts a ON a.quiz_id = q.quiz_id
            WHERE a.id = ?
            ORDER BY q.id ASC
        ");
        $stmt->execute([$attemptId]);

        $questions = $stmt->fetchAll();

        foreach ($questions as &$q) {
            $q['options'] = $this->getOptions($q['id']);
        }

        return $questions;
    }
    public function countByQuiz(int $quizId): int
    {
        $sql = "SELECT COUNT(*) FROM questions WHERE quiz_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$quizId]);
        return (int)$stmt->fetchColumn();
    }
}
