<?php

use App\Core\View;
use App\Core\Auth;

$u = Auth::user();
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title ?? "پنل مدیر" ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vazirmatn@33.0.2/Vazirmatn-font-face.css" rel="stylesheet">

    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        div,
        span,
        a,
        button,
        input {
            font-family: 'Vazirmatn', sans-serif !important;
        }

        body {
            background: #f4f6f9;
        }

        .top-menu {
            background: #212529;
            padding: 12px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, .15);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .top-menu a {
            color: #fff !important;
            margin-left: 15px;
            font-weight: 500;
            text-decoration: none;
        }

        .top-menu a:hover {
            opacity: .8;
        }

        .admin-content {
            margin-top: 40px;
        }
    </style>
</head>

<body>

    <!-- منوی بالای پنل مدیر -->
    <div class="top-menu d-flex justify-content-between align-items-center text-white">

        <div class="d-flex align-items-center">
            <a href="<?= View::baseUrl('/admin/dashboard') ?>" class="btn btn-sm btn-info me-3">بازگشت داشبورد</a>
            <strong style="font-size: 18px;">سامانه مدیر</strong>
        </div>

        <div class="d-flex align-items-center">
            <a href="<?= View::baseUrl('/admin/subjects') ?>">مدیریت درس‌ها</a>
            <a href="<?= View::baseUrl('/admin/quizzes') ?>">مدیریت آزمون‌ها</a>
            <a href="<?= View::baseUrl('/admin/users') ?>">مدیریت کاربران</a>
            <a href="<?= View::baseUrl('/admin/results') ?>">نتایج</a>
            <a href="<?= View::baseUrl('/admin/backup') ?>">پشتیبان‌گیری</a>


            <span class="ms-3 text-warning fw-bold">
                <?= htmlspecialchars($u['name'] ?? '') ?>
            </span>

            <a href="<?= View::baseUrl('/logout') ?>" class="btn btn-sm btn-warning ms-3">خروج</a>
        </div>

    </div>


    <!-- محتوای داخلی -->
    <div class="container admin-content">
        <?= $content ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
