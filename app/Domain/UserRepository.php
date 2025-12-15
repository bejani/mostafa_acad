<?php

namespace App\Domain;

use App\Core\Database;

class UserRepository
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function all()
    {
        $stmt = $this->db->query("SELECT * FROM users ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function findByUsername($username)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username=?");
        $stmt->execute([$username]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("
            INSERT INTO users (name, username, password_hash, role, is_active)
            VALUES (:name, :username, :password_hash, :role, :is_active)
        ");
        return $stmt->execute($data);
    }
    public function findById($id)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }


    public function update($id, $data)
    {
        $stmt = $this->db->prepare("
            UPDATE users
            SET name=:name, username=:username, role=:role, is_active=:is_active
            WHERE id=:id
        ");
        return $stmt->execute($data);
    }

    public function updatePassword($id, $hash)
    {
        $stmt = $this->db->prepare("UPDATE users SET password_hash=? WHERE id=?");
        $stmt->execute([$hash, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id=?");
        $stmt->execute([$id]);
    }

    public function toggle($id)
    {
        $user = $this->find($id);
        $newStatus = $user['is_active'] ? 0 : 1;

        $stmt = $this->db->prepare("UPDATE users SET is_active=? WHERE id=?");
        $stmt->execute([$newStatus, $id]);
    }
}