<div class="container py-4">

    <h3 class="mb-4">تلاش‌های شما برای آزمون: <?= htmlspecialchars($attempts[0]['quiz_title']) ?></h3>

    <!-- دکمه بازگشت -->
    <a href="<?= \App\Core\View::baseUrl('/student/results') ?>" class="btn btn-secondary mb-3">
        ← بازگشت به لیست آزمون‌ها
    </a>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>شماره</th>
                    <th>درصد</th>
                    <th>مدت</th>
                    <th>تاریخ</th>
                    <th>جزئیات</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($attempts as $a): ?>
                <tr>
                    <td>#<?= $a['id'] ?></td>
                    <td><?= $a['score'] ?>%</td>
                    <td><?= $a['duration_seconds'] ?> ثانیه</td>
                    <td><?= $a['started_at'] ?></td>
                    <td>
                        <a class="btn btn-sm btn-outline-primary"
                            href="<?= \App\Core\View::baseUrl('/student/results/attempt?attempt_id=' . $a['id']) ?>">
                            مشاهده
                        </a>
                        <a href="<?= \App\Core\View::baseUrl('/student/attempt/delete?attempt_id=' . $a['id']) ?>"
                            class="btn btn-outline-danger btn-sm"
                            onclick="return confirm('آیا از حذف این تلاش مطمئن هستید؟')">
                            ❌ حذف
                        </a>

                    </td>


                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>

</div>