<div class="d-flex align-items-center justify-content-between mb-3">
    <h3 class="mb-0">نتایج آزمون‌ها</h3>
    <a class="btn btn-success" href="<?= App\Core\View::baseUrl('/admin/results?download=csv') ?>">
        دانلود CSV
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>کوییز</th>
                <th>دانش‌آموز</th>
                <th>نام کاربری</th>
                <th>نمره</th>
                <th>شروع</th>
                <th>پایان</th>
                <th>مدت (ثانیه)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($rows)) : ?>
                <?php foreach ($rows as $r) : ?>
                    <tr>
                        <td><?= htmlspecialchars($r['attempt_id'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($r['quiz_title'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($r['student_name'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($r['student_username'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($r['score'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($r['started_at'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($r['finished_at'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($r['duration_seconds'] ?? '-') ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="8">نتیجه‌ای یافت نشد.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
