<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>ویرایش آزمون</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">

        <h3 class="mb-4">ویرایش آزمون</h3>

        <form method="post" action="index.php?route=/admin/quizzes/edit">

            <input type="hidden" name="id" value="<?= $quiz['id'] ?>">

            <div class="mb-3">
                <label class="form-label">عنوان آزمون</label>
                <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($quiz['title']) ?>"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">ماژول</label>
                <select name="module" class="form-select">
                    <?php foreach ($modules as $key => $label): ?>
                    <option value="<?= $key ?>" <?= $quiz['module'] === $key ? 'selected' : '' ?>>
                        <?= $label ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">تعداد سؤالات</label>
                <input type="number" name="question_count" class="form-control"
                    value="<?= (int)$quiz['question_count'] ?>" min="1">
            </div>

            <div class="mb-3">
                <label class="form-label">زمان آزمون (ثانیه)</label>
                <input type="number" name="time_limit_seconds" class="form-control"
                    value="<?= (int)$quiz['time_limit_seconds'] ?>" min="0">
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="is_published" id="is_published"
                    <?= $quiz['is_published'] ? 'checked' : '' ?>>
                <label class="form-check-label" for="is_published">
                    انتشار آزمون
                </label>
            </div>

            <button class="btn btn-primary">ذخیره تغییرات</button>
            <a href="index.php?route=/admin/quizzes" class="btn btn-secondary">بازگشت</a>

        </form>

    </div>

</body>

</html>