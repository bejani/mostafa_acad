<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'پنل معلم' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vazirmatn@33.0.2/Vazirmatn-font-face.css" rel="stylesheet">

    <style>
        /* Teacher-specific top bar styles (distinct from admin/student) */
        .teacher-top {
            background: linear-gradient(90deg, #0f7a5f, #138a6a);
            /* teal/green */
            padding: 8px 12px;
            color: #fff;
        }

        /* center the actions */
        .teacher-top .teacher-actions {
            display: flex;
            gap: 10px;
            justify-content: center;
            align-items: center;
        }

        .teacher-top .teacher-actions a {
            color: #fff;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            padding: 8px 14px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
        }

        .teacher-top .teacher-actions a:hover {
            background: rgba(255, 255, 255, 0.12);
            text-decoration: none;
        }

        body,
        h1,
        h2,
        h3,
        p,
        a,
        button,
        input {
            font-family: 'Vazirmatn', sans-serif !important;
        }
    </style>
</head>

<body class="bg-light">

    <!-- Teacher top bar with action buttons -->
    <div class="teacher-top d-flex align-items-center justify-content-between">
        <div class="ms-3 text-white"><strong>پنل معلم</strong></div>
        <div class="teacher-actions">
            <a href="<?= \App\Core\View::baseUrl('/teacher/dashboard') ?>">داشبورد</a>
            <a href="<?= \App\Core\View::baseUrl('/teacher/quizzes') ?>">آزمون‌های من</a>
            <a href="<?= \App\Core\View::baseUrl('/teacher/results') ?>">نتایج فراگیران</a>
        </div>
    </div>

    <nav class="navbar navbar-dark" style="background:#111;">
        <div class="container-fluid">
            <span class="navbar-brand"></span>
            <div>
                <a class="btn btn-sm btn-outline-light" href="<?= \App\Core\View::baseUrl('/logout') ?>">خروج</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-3">
        <div class="row">
            <main class="col-12">
                <?= $content ?>
            </main>
        </div>
    </div>

</body>

</html>