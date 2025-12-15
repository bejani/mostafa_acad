<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'پنل معلم' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vazirmatn@33.0.2/Vazirmatn-font-face.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand">پنل معلم</span>
            <div>
                <a class="btn btn-sm btn-outline-light" href="<?= url('logout') ?>">خروج</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-3">
        <div class="row">
            <aside class="col-md-2">
                <div class="list-group">
                    <a class="list-group-item" href="<?= url('teacher/dashboard') ?>">داشبورد</a>
                    <a class="list-group-item" href="<?= url('teacher/quizzes') ?>">آزمون‌های من</a>
                    <a class="list-group-item" href="<?= url('teacher/results') ?>">نتایج فراگیران</a>
                </div>
            </aside>

            <main class="col-md-10">
                <?= $content ?>
            </main>
        </div>
    </div>

</body>

</html>