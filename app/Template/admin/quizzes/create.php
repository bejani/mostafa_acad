<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>افزودن آزمون</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">

        <h3 class="mb-4">افزودن آزمون جدید</h3>

        <form method="post" action="index.php?route=/admin/quizzes/create">

            <div class="mb-3">
                <label class="form-label">عنوان آزمون</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">درس</label>
                <select name="subject_id" class="form-select" required>
                    <option value="">انتخاب درس...</option>
                    <?php foreach ($subjects as $sub): ?>
                        <option value="<?= (int)$sub['id'] ?>">
                            <?= htmlspecialchars($sub['title']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">ماژول</label>
                <select name="module" class="form-select">
                    <?php foreach ($modules as $key => $label): ?>
                        <option value="<?= htmlspecialchars($key) ?>">
                            <?= htmlspecialchars($label) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div class="mb-3">
                <label class="form-label">تعداد سؤالات (برای انتخاب خودکار)</label>
                <input type="number" name="question_count" class="form-control" value="20" min="1">
            </div>

            <div class="mb-3">
                <label class="form-label">زمان آزمون (بر حسب ثانیه)</label>
                <input type="number" name="time_limit_seconds" class="form-control" value="0" min="0">
                <div class="form-text">اگر صفر باشد، آزمون بدون محدودیت زمانی است.</div>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="is_published" id="is_published" checked>
                <label class="form-check-label" for="is_published">
                    انتشار آزمون (قابل مشاهده برای هنرجوها)
                </label>
            </div>

            <button class="btn btn-success">ثبت</button>
            <a href="index.php?route=/admin/quizzes" class="btn btn-secondary">بازگشت</a>

        </form>

    </div>

</body>

</html>