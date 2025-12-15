<?php

namespace App\Domain;

use PDO;
use App\Core\Database;

class SubjectRepository
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function all(): array
    {
        $stmt = $this->db->query("SELECT * FROM subjects WHERE is_active = 1 ORDER BY title");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM subjects WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    public function create(array $data): int
    {
        $stmt = $this->db->prepare("
            INSERT INTO subjects (title, grade, major, code, is_active)
            VALUES (:title, :grade, :major, :code, :is_active)
        ");
        $stmt->execute([
            'title'     => $data['title'],
            'grade'     => $data['grade'] ?? null,
            'major'     => $data['major'] ?? null,
            'code'      => $data['code'] ?? null,
            'is_active' => $data['is_active'] ?? 1,
        ]);
        return (int)$this->db->lastInsertId();
    }
    public function update(int $id, array $data): void
    {
        $stmt = $this->db->prepare("
            UPDATE subjects
            SET title = :title, grade = :grade, major = :major, code = :code
            WHERE id = :id
        ");
        $stmt->execute([
            'title' => $data['title'],
            'grade' => $data['grade'] ?? null,
            'major' => $data['major'] ?? null,
            'code'  => $data['code'] ?? null,
            'id'    => $id,
        ]);
    }

    public function delete(int $id): void
    {
        $stmt = $this->db->prepare("DELETE FROM subjects WHERE id = ?");
        $stmt->execute([$id]);
    }
}
