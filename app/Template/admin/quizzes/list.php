<h3 class="mb-4">مدیریت آزمون‌ها</h3>

<div class="mb-3">
    <a href="index.php?route=/admin/quizzes/create" class="btn btn-primary">
        افزودن آزمون جدید
    </a>
</div>

<table class="table table-bordered table-striped text-center align-middle">
    <thead class="table-dark">
        <tr>
            <th>عنوان</th>
            <th>ماژول</th>
            <th>تعداد سؤال</th>
            <th>زمان</th>
            <th>وضعیت</th>
            <th>عملیات</th>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($quizzes)): ?>
            <?php foreach ($quizzes as $q): ?>
                <tr>
                    <td><?= htmlspecialchars($q['title']) ?></td>
                    <td><?= htmlspecialchars($q['module']) ?></td>
                    <td><?= (int)$q['question_count'] ?>/<?= (int)$q['real_count'] ?></td>

                    <td><?= (int)$q['time_limit_seconds'] ?> ثانیه</td>

                    <td>
                        <?php if ($q['is_published']): ?>
                            <span class="badge bg-success">منتشر شده</span>
                        <?php else: ?>
                            <span class="badge bg-secondary">پیش‌نویس</span>
                        <?php endif; ?>
                    </td>

                    <td>

                        <!-- 🔥 مدیریت سؤالات -->
                        <a href="index.php?route=/admin/questions&quiz_id=<?= $q['id'] ?>" class="btn btn-info btn-sm">
                            سؤالات
                        </a>

                        <!-- ویرایش آزمون -->
                        <a href="index.php?route=/admin/quizzes/edit&id=<?= $q['id'] ?>" class="btn btn-warning btn-sm">
                            ویرایش
                        </a>

                        <!-- حذف آزمون -->
                        <a href="index.php?route=/admin/quizzes/delete&id=<?= $q['id'] ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('آیا مطمئن هستید؟')">
                            حذف
                        </a>

                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">هیچ آزمونی ثبت نشده است.</td>
            </tr>
        <?php endif; ?>
    </tbody>

</table>