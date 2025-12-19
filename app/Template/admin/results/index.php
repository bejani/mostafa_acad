<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">نتایج آزمون‌ها</h3>
        <a class="btn btn-secondary" href="<?= \App\Core\View::baseUrl('/admin/dashboard') ?>">بازگشت به داشبورد</a>
    </div>

    <?php if (empty($rows)): ?>
        <div class="alert alert-info">هیچ نتیجه‌ای یافت نشد.</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-striped text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>عنوان آزمون</th>
                        <th>نام دانش آموز</th>
                        <th>تعداد تلاش</th>
                        <th>Last score</th>
                        <th>Best score</th>
                        <th>Avg score</th>
                        <th>آخرین تلاش</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $r): ?>
                        <tr>
                            <td><?= htmlspecialchars($r['quiz_title'] ?? '') ?></td>
                            <td><?= htmlspecialchars($r['student_name'] ?? '') ?></td>
                            <td><?= (int)($r['attempts_count'] ?? 0) ?></td>
                            <td><?= isset($r['last_score']) ? number_format((float)$r['last_score'], 1) . '%' : '-' ?></td>
                            <td><?= isset($r['best_score']) ? number_format((float)$r['best_score'], 1) . '%' : '-' ?></td>
                            <td><?= isset($r['avg_score']) ? number_format((float)$r['avg_score'], 1) . '%' : '-' ?></td>
                            <td><?= htmlspecialchars($r['last_time'] ?? '') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>