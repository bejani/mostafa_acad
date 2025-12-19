<?php

namespace App\Domain;

use App\Core\Database;

class ContentRepository
{
    public function all()
    {
        return Database::getConnection()
            ->query("SELECT * FROM contents ORDER BY id DESC")
            ->fetchAll();
    }

    public function find($id)
    {
        $stmt = Database::getConnection()->prepare("SELECT * FROM contents WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("
            INSERT INTO contents (title, type, category, path, link_url, description, created_by)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");

        return $stmt->execute([
            $data['title'],
            $data['type'],
            $data['category'],
            $data['path'],
            $data['link_url'],
            $data['description'],
            $data['created_by']
        ]);
    }

    public function countPublished()
    {
        $db = Database::getConnection();
        return $db->query("SELECT COUNT(*) AS c FROM contents WHERE is_published = 1")
            ->fetch()['c'];
    }

    public function update($id, $data)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("
            UPDATE contents
            SET title=?, type=?, category=?, path=?, link_url=?, description=?
            WHERE id=?
        ");

        return $stmt->execute([
            $data['title'],
            $data['type'],
            $data['category'],
            $data['path'],
            $data['link_url'],
            $data['description'],
            $id
        ]);
    }

    public function allPublished(): array
    {
        $sql = "
            SELECT *
            FROM contents
            WHERE is_published = 1
            ORDER BY created_at DESC
        ";

        $db = Database::getConnection();
        $stmt = $db->query($sql);

        return $stmt->fetchAll();
    }

    public function delete($id)
    {
        $stmt = Database::getConnection()->prepare("DELETE FROM contents WHERE id = ?");
        return $stmt->execute([$id]);
    }


    public function incrementViews(int $id)
    {
        $stmt = Database::getConnection()->prepare("UPDATE contents SET views = views + 1 WHERE id=?");
        return $stmt->execute([$id]);
    }
}
