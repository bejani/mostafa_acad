<?php

namespace App\Domain;

use App\Core\Database;
use PDO;

class AttemptRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    /**
     * ایجاد تلاش جدید
     */
    public function create(array $data)
    {
        $stmt = $this->db->prepare("
            INSERT INTO attempts (quiz_id, user_id, started_at, score, duration_seconds, question_order)
            VALUES (?, ?, NOW(), ?, ?, ?)
        ");

        $stmt->execute([
            $data['quiz_id'],
            $data['user_id'],
            $data['score'] ?? 0,
            $data['duration_seconds'] ?? 0,
            $data['question_order'] ?? null
        ]);

        return $this->db->lastInsertId();
    }

    /**
     * یافتن تلاش
     */
    public function find($attemptId)
    {
        $stmt = $this->db->prepare("SELECT * FROM attempts WHERE id = ?");
        $stmt->execute([$attemptId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * ذخیره پاسخ هنرجو
     */
    public function saveAnswer($attemptId, $questionId, $answerText, $selectedOptionJson, $isCorrect)
    {
        $stmt = $this->db->prepare("
            INSERT INTO attempt_answers
            (attempt_id, question_id, answer_text, selected_option_ids, is_correct)
            VALUES (?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $attemptId,
            $questionId,
            $answerText,
            $selectedOptionJson,
            $isCorrect ? 1 : 0
        ]);
    }

    /**
     * پایان تلاش
     */
    public function finish($attemptId, $score, $duration)
    {
        $stmt = $this->db->prepare("
            UPDATE attempts
            SET score = ?, finished_at = NOW(), duration_seconds = ?
            WHERE id = ?
        ");

        return $stmt->execute([$score, $duration, $attemptId]);
    }

    /**
     * گرفتن پاسخ‌ها (20 سؤال همان Attempt)
     */
    public function getAnswersWithDetails($attemptId)
    {
        // فقط سؤالاتی که هنرجو جواب داده
        $sql = "
            SELECT 
                aa.id AS aa_id,
                aa.question_id,
                aa.answer_text,
                aa.selected_option_ids,
                aa.is_correct,
                q.body AS question_text,
                q.explanation,
                q.type
            FROM attempt_answers aa
            JOIN questions q ON q.id = aa.question_id
            WHERE aa.attempt_id = ?
            ORDER BY aa.question_id
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$attemptId]);
        $answers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // گرفتن گزینه‌های هر سؤال
        $optStmt = $this->db->prepare("
            SELECT id, body, is_correct
            FROM options
            WHERE question_id = ?
            ORDER BY id
        ");

        foreach ($answers as &$ans) {
            $optStmt->execute([$ans['question_id']]);
            $ans['options'] = $optStmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $answers;
    }

    /**
     * لیست همه تلاش‌های یک هنرجو
     */
    public function getUserAttempts($userId)
    {
        $sql = "
            SELECT a.*, q.title AS quiz_title
            FROM attempts a
            JOIN quizzes q ON q.id = a.quiz_id
            WHERE a.user_id = ?
            ORDER BY a.id DESC
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * لیست آزمون‌هایی که هنرجو در آنها امتحان داده
     */
    public function getUserQuizList($userId)
    {
        $sql = "
            SELECT q.id, q.title, COUNT(a.id) AS attempt_count
            FROM attempts a
            JOIN quizzes q ON q.id = a.quiz_id
            WHERE a.user_id = ?
            GROUP BY q.id
            ORDER BY q.title
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * تمام تلاش‌های یک هنرجو برای یک آزمون خاص
     */
    public function getAttemptsForQuiz($userId, $quizId)
    {
        $sql = "
            SELECT a.*, q.title AS quiz_title
            FROM attempts a
            JOIN quizzes q ON q.id = a.quiz_id
            WHERE a.user_id = ? AND a.quiz_id = ?
            ORDER BY a.id DESC
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId, $quizId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function countByUser($userId)
    {
        $stmt = $this->db->prepare("
        SELECT COUNT(*) AS cnt
        FROM attempts
        WHERE user_id = ?
    ");

        $stmt->execute([$userId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return (int)$row['cnt'];
    }
    public function deleteAttempt($attemptId)
    {
        // حذف پاسخ‌های این تلاش
        $stmt = $this->db->prepare("DELETE FROM attempt_answers WHERE attempt_id = ?");
        $stmt->execute([$attemptId]);

        // حذف خود تلاش
        $stmt = $this->db->prepare("DELETE FROM attempts WHERE id = ?");
        $stmt->execute([$attemptId]);
    }
    /**
     * خلاصه نتایج برای معلم:
     * هر ردیف = (quiz, student) + تعداد دفعات + آخرین تاریخ
     */
    public function teacherResultsSummary(int $teacherId): array
    {
        $sql = "
        SELECT 
            q.id AS quiz_id,
            q.title AS quiz_title,
            u.id AS user_id,
            u.name AS student_name,
            COUNT(a.id) AS attempts_count,
            MAX(a.started_at) AS last_time
        FROM quizzes q
        JOIN attempts a ON a.quiz_id = q.id
        JOIN users u ON u.id = a.user_id
        WHERE q.created_by = ?
        GROUP BY q.id, u.id
        ORDER BY last_time DESC
    ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$teacherId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * همه attemptهای یک دانش‌آموز برای یک آزمون (جهت نمایش جزئیات در پنل معلم)
     */
    public function getAttemptsForUserQuiz(int $quizId, int $userId): array
    {
        $stmt = $this->db->prepare("
        SELECT *
        FROM attempts
        WHERE quiz_id = ? AND user_id = ?
        ORDER BY id DESC
    ");
        $stmt->execute([$quizId, $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function adminResults(): array
    {
        $sql = "
            SELECT 
                a.id AS attempt_id,
                a.quiz_id,
                a.user_id,
                a.score,
                a.started_at,
                a.finished_at,
                a.duration_seconds,
                q.title AS quiz_title,
                u.name AS student_name,
                u.username AS student_username
            FROM attempts a
            JOIN quizzes q ON q.id = a.quiz_id
            JOIN users u   ON u.id = a.user_id
            ORDER BY a.id DESC
        ";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
