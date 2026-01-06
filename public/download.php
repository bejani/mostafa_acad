<?php
// ---------------------------------------------------------
//  دانلودر پیشرفته و امن برای فایل‌های آموزشی
// ---------------------------------------------------------

// 1) گرفتن نام فایل از لینک
$filename = $_GET['f'] ?? '';
$filename = trim($filename);

// 2) جلوگیری از حمله Directory Traversal
// مثلا: ../../secret.php
if (!$filename || str_contains($filename, '..') || str_contains($filename, '/')) {
    http_response_code(400);
    exit("Invalid file request.");
}

// 3) مسیر فولدر uploads که بیرون public است
$basePath = dirname(__DIR__) . '/uploads/';

// 4) مسیر کامل فایل
$fullPath = $basePath . $filename;

// 5) بررسی وجود فایل
if (!is_file($fullPath)) {
    http_response_code(404);
    exit("File not found.");
}

// 6) لیست پسوندهای مجاز
$allowedExtensions = [
    'pdf',
    'doc',
    'docx',
    'xls',
    'xlsx',
    'ppt',
    'pptx',
    'mp4',
    'avi',
    'mov',
    'jpg',
    'jpeg',
    'png',
    'txt'
];

$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

// جلوگیری از دانلود فایل غیرمجاز
if (!in_array($ext, $allowedExtensions)) {
    http_response_code(403);
    exit("File type not allowed.");
}

// 7) MIME Type دقیق فایل
$mime = mime_content_type($fullPath) ?: 'application/octet-stream';

header("Content-Type: $mime");

// 8) تعیین حالت نمایش
// ویدئو + PDF + عکس = نمایش داخل مرورگر
if (in_array($ext, ['pdf', 'mp4', 'jpg', 'jpeg', 'png'])) {
    header('Content-Disposition: inline; filename="' . basename($filename) . '"');
} else {
    // بقیه فایل‌ها دانلود شوند
    header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
}

header("Content-Length: " . filesize($fullPath));
header("X-Content-Type-Options: nosniff");

// 9) ارسال فایل
readfile($fullPath);
exit;
