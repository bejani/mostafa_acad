<?php

namespace App\Core;

use PDO;
use PDOException;


class Database
{
    private static ?PDO $pdo = null;

    /**
     * مقداردهی اولیه اتصال دیتابیس
     */
    public static function init(array $config): void
    {
        if (self::$pdo !== null) {
            return; // اگر قبلاً وصل شده، دوباره وصل نشود
        }

        $host    = $config['host'] ?? 'localhost';
        $dbname  = $config['dbname'] ?? 'mostafadb';
        $user    = $config['user'] ?? 'root';
        $pass    = $config['pass'] ?? '4562';
        $charset = $config['charset'] ?? 'utf8mb4';


        $dsn = "mysql:host={$host};dbname={$dbname};charset={$charset}";

        try {
            self::$pdo = new PDO(
                $dsn,
                $user,
                $pass,
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    /**
     * دریافت کانکشن PDO
     */
    public static function getConnection(): PDO
    {
        if (!self::$pdo) {
            throw new \RuntimeException("Database connection not initialized.");
        }

        return self::$pdo;
    }
}
