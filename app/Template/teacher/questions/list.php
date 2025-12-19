<h3 class="mb-4">مدیریت سؤالات آزمون: <?= htmlspecialchars($quiz['title']) ?></h3>

<div class="mb-3 d-flex gap-2">

    <a href="index.php?route=/teacher/questions/create&quiz_id=<?= $quiz['id'] ?>" class="btn btn-success">
        افزودن سؤال جدید
    </a>
    <a class="btn btn-secondary" href="index.php?route=/teacher/questions/import-text&quiz_id=<?= e($quiz['id']) ?>">
        افزودن سؤال تکی (از متن)
    </a>

    <a href="index.php?route=/teacher/questions/import-docx&quiz_id=<?= $quiz['id'] ?>" class="btn btn-primary">
        ایمپورت از Word (DOCX)
    </a>

    <a href="index.php?route=/teacher/quizzes" class="btn btn-secondary">
        بازگشت به لیست آزمون‌ها
    </a>

</div>

<table class="table table-bordered table-striped text-center align-middle">
    <thead class="table-dark">
        <tr>
            <th>شناسه</th>
            <th>متن سؤال</th>
            <th>نوع</th>
            <th>عملیات</th>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($questions)): ?>
        <?php $i = 1; ?>
        <?php foreach ($questions as $q): ?>
        <tr>
            <!-- <td><?= $q['id'] ?></td>      -->
            <td><?= $i++ ?></td>
            <td style="text-align: right;"><?= htmlspecialchars($q['body']) ?></td>
            <td><?= $q['type'] ?></td>

            <td>
                <a href="index.php?route=/teacher/questions/edit&id=<?= $q['id'] ?>" class="btn btn-warning btn-sm">
                    ویرایش
                </a>

                <a href="index.php?route=/teacher/questions/delete&id=<?= $q['id'] ?>&quiz_id=<?= $quiz['id'] ?>"
                    onclick="return confirm('این سؤال حذف شود؟')" class="btn btn-danger btn-sm">
                    حذف
                </a>
            </td>
        </tr>
        <?php endforeach; ?>

        <?php else: ?>
        <tr>
            <td colspan="4">هیچ سؤالی برای این آزمون ثبت نشده است.</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>