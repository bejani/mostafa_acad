<?php

namespace App\Domain;

use App\Core\Database;
use PDO;

class ContentRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    /**
     * Return all contents
     * @return array
     */
    public function all(): array
    {
        try {
            $stmt = $this->db->query("SELECT * FROM contents ORDER BY id DESC");
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            // Table might not exist yet — return empty list to avoid fatal errors
            return [];
        }
    }

    /**
     * Return published contents
     * @return array
     */
    public function allPublished(): array
    {
        try {
            $stmt = $this->db->query("SELECT * FROM contents WHERE is_published = 1 ORDER BY id DESC");
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            return [];
        }
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM contents WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }
}
