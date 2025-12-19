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

    <title><?= $title ?? "پنل دانش‌آموز" ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vazirmatn@33.0.2/Vazirmatn-font-face.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Vazirmatn', sans-serif !important;
        }

        .student-navbar {
            background: #0d6efd;
            padding: 12px;
            color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .15);
        }

        .student-navbar a {
            color: #fff !important;
            margin-right: 18px;
            text-decoration: none;
            font-weight: 500;
        }

        .student-navbar a:hover {
            opacity: .85;
        }

        .container-student {
            padding-top: 100px;
        }

        @media (max-width: 768px) {
            .container-student {
                padding-top: 140px !important;
            }
        }
    </style>

</head>

<body>

    <nav class="student-navbar fixed-top d-flex justify-content-between align-items-center">
        <div>
            <strong>سامانه دانش‌آموز</strong>
            <div style="font-size: 14px; margin-top: 4px; opacity: .9;">
                خوش آمدید <?= htmlspecialchars($u['name'] ?? '') ?>
            </div>
        </div>

        <div class="d-flex align-items-center">
            <a href="index.php?route=/student/panel">خانه</a>
            <a href="index.php?route=/student/quizzes">آزمون‌ها</a>
            <a href="index.php?route=/student/results">نتایج</a>
            <a href="index.php?route=/logout" class="btn btn-sm btn-warning ms-3">خروج</a>
        </div>
    </nav>

    <div class="container container-student">
        <?= $content ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
