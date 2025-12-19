<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="mb-1">تلاش‌های آزمون: <?= htmlspecialchars($quiz['title'] ?? '') ?></h4>
            <p class="text-muted mb-0">کاربر: <?= htmlspecialchars($quiz['student_name'] ?? ($_GET['user_id'] ?? '')) ?></p>
        </div>
        <a class="btn btn-secondary" href="<?= \App\Core\View::baseUrl('/teacher/results') ?>">بازگشت</a>
    </div>

    <?php if (empty($attempts)): ?>
        <div class="alert alert-info">برای این دانش‌آموز در این آزمون، تلاشی ثبت نشده است.</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>نمره</th>
                        <th>مدت (ثانیه)</th>
                        <th>شروع</th>
                        <th>پایان</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($attempts as $a): ?>
                    <tr>
                        <td><?= (int)$a['id'] ?></td>
                        <td><?= htmlspecialchars($a['score']) ?>%</td>
                        <td><?= htmlspecialchars($a['duration_seconds']) ?></td>
                        <td><?= htmlspecialchars($a['started_at'] ?? '') ?></td>
                        <td><?= htmlspecialchars($a['finished_at'] ?? '') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

</div>
