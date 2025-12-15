<?php

declare(strict_types=1);

use App\Core\Database;

// تنظیمات منطقه زمانی
date_default_timezone_set('Asia/Tehran');

// بارگذاری تنظیمات
$config = require __DIR__ . '/Config/config.php';

// echo $config['db']['host'];
// die("end");
// اتصال دیتابیس
Database::init($config['db']);

require_once __DIR__ . '/Core/helpers.php';
