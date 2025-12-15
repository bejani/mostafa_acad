<?php

namespace App\Action\Admin\Backup;

use App\Core\Auth;
use App\Core\View;
use PDO;

class BackupAction
{
    public function __invoke()
    {
        if (!Auth::isAdmin()) {
            View::redirect("/login");
        }

        // -----------------------------
        // مسیر فولدر بکاپ ها
        // -----------------------------
        $backupDir = dirname(__DIR__, 4) . "/backups/";

        if (!is_dir($backupDir)) {
            mkdir($backupDir, 0777, true);
        }

        $date = date("Y-m-d_H-i-s");

        // -----------------------------
        // 1) بکاپ دیتابیس (SQL)
        // -----------------------------
        $dbFile = $backupDir . "backup_{$date}.sql";

        $pdo = \App\Core\Database::getConnection();

        $tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);

        $sqlDump = "";

        foreach ($tables as $table) {
            // ساختار جدول
            $create = $pdo->query("SHOW CREATE TABLE `$table`")->fetch();
            $sqlDump .= "-- TABLE: $table\n";
            $sqlDump .= $create['Create Table'] . ";\n\n";

            // داده‌ها
            $rows = $pdo->query("SELECT * FROM `$table`")->fetchAll();

            foreach ($rows as $row) {
                $vals = array_map(function ($v) {
                    return $v === null ? "NULL" : "'" . addslashes($v) . "'";
                }, array_values($row));

                $sqlDump .= "INSERT INTO `$table` VALUES (" . implode(",", $vals) . ");\n";
            }
            $sqlDump .= "\n\n";
        }

        file_put_contents($dbFile, $sqlDump);

        // -----------------------------
        // 2) بکاپ پوشه uploads (ZIP)
        // -----------------------------
        $zipFile = $backupDir . "uploads_{$date}.zip";

        $uploadsFolder = dirname(__DIR__, 4) . "/uploads/";

        $zip = new \ZipArchive();
        if ($zip->open($zipFile, \ZipArchive::CREATE) === TRUE) {

            if (is_dir($uploadsFolder)) {

                $files = new \RecursiveIteratorIterator(
                    new \RecursiveDirectoryIterator($uploadsFolder),
                    \RecursiveIteratorIterator::LEAVES_ONLY
                );

                foreach ($files as $file) {
                    if (!$file->isDir()) {
                        $filePath = $file->getRealPath();
                        $relative = substr($filePath, strlen($uploadsFolder));

                        $zip->addFile($filePath, $relative);
                    }
                }
            }

            $zip->close();
        }

        // -----------------------------
        // نمایش نتیجه
        // -----------------------------
        return View::render("admin/backup/index.php", [
            "backup_sql" => basename($dbFile),
            "backup_zip" => basename($zipFile),
        ]);
    }
}
