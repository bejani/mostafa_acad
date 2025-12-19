<h3 class="mb-4">ایمپورت سؤالات از Word</h3>

<h3>ایمپورت سوالات از فایل Word</h3>

<form action="index.php?route=/admin/questions/import/preview" method="post" enctype="multipart/form-data">

    <label class="mt-3">انتخاب آزمون:</label>
    <select name="quiz_id" class="form-control" required>

        <?php foreach ($quizzes as $q): ?>
        <option value="<?= $q['id'] ?>">
            <?= htmlspecialchars($q['title']) ?>
        </option>
        <?php endforeach; ?>
    </select>

    <label class="mt-3">انتخاب فایل Word (.docx):</label>
    <input type="file" name="docx" class="form-control" required>

    <button class="btn btn-primary mt-4">نمایش پیش‌نمایش</button>
</form>