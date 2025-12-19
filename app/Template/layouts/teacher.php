<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'پنل معلم' ?></title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vazirmatn@33.0.2/Vazirmatn-font-face.css" rel="stylesheet">

    <style>
        body {
            font-family: Vazirmatn, sans-serif;
        }

        .navbar-brand {
            font-weight: 600;
        }

        .nav-link {
            font-size: 14px;
            opacity: .9;
        }

        .nav-link.active {
            font-weight: 600;
            opacity: 1;
        }

        main {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, .05);
        }
    </style>
</head>

<body class="bg-light">

    <?php $u = \App\Core\Auth::user(); ?>
    <?php
    $teacherSubjects = [];
    if (\App\Core\Auth::isTeacher() && isset($u['id'])) {
        $subjectIds = (new \App\Domain\UserSubjectRepository())->subjectsForUser((int)$u['id']);
        if (!empty($subjectIds)) {
            $teacherSubjects = (new \App\Domain\SubjectRepository())->findByIds($subjectIds);
        }
    }
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
        <div class="container-fluid">

            <span class="navbar-brand d-flex align-items-center gap-2">
                <i class="bi bi-mortarboard-fill"></i>
                پنل معلم
            </span>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#teacherNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="teacherNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-lg-2">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= App\Core\View::baseUrl('teacher/dashboard') ?>">
                            <i class="bi bi-speedometer2"></i>
                            داشبورد
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= App\Core\View::baseUrl('teacher/quizzes') ?>">
                            <i class="bi bi-journal-text"></i>
                            آزمون‌های من
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= App\Core\View::baseUrl('teacher/students') ?>">
                            <i class="bi bi-people"></i>
                            دانش‌آموزان
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= App\Core\View::baseUrl('teacher/results') ?>">
                            <i class="bi bi-bar-chart"></i>
                            نتایج
                        </a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-3 text-white">
                    <div class="small opacity-75">
                        سلام، <strong><?= htmlspecialchars($u['name'] ?? 'کاربر') ?></strong>
                    </div>
                    <a class="btn btn-sm btn-outline-light" href="<?= App\Core\View::baseUrl('logout') ?>">
                        <i class="bi bi-box-arrow-right"></i>
                        خروج
                    </a>
                </div>
            </div>

        </div>
    </nav>

    <?php if (!empty($teacherSubjects)) : ?>
        <div class="bg-white border-bottom">
            <div class="container-fluid py-2">
                <div class="d-flex flex-wrap align-items-center gap-2 text-success">
                    <span class="fw-semibold small">درس‌ها:</span>
                    <?php foreach ($teacherSubjects as $sub) : ?>
                        <span class="badge bg-success-subtle text-success border border-success-subtle">
                            <?= htmlspecialchars($sub['title'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="container-fluid my-4">
        <div class="row justify-content-center">
            <main class="col-12 col-xl-10">
                <?= $content ?>
            </main>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>