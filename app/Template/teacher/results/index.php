<?php

/**
 * Simple teacher results list view
 * Expected variables: $user, $rows (array of summary rows)
 */
?>

<div class="container">
    <h1>نتایج آزمون‌ها</h1>

    <?php if (empty($rows)): ?>
        <div class="alert alert-info">نتیجی یافت نشد.</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>آی‌دی آزمون</th>
                        <th>نام آزمون</th>
                        <th>تعداد شرکت‌کنندگان</th>
                        <th>میانگین نمره</th>
                        <th>اقدامات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $r): ?>
                        <tr>
                            <td><?= htmlspecialchars($r['quiz_id'] ?? $r['id'] ?? '') ?></td>
                            <td><?= htmlspecialchars($r['quiz_title'] ?? $r['title'] ?? '') ?></td>
                            <td><?= htmlspecialchars($r['attempts_count'] ?? $r['count'] ?? '') ?></td>
                            <td><?= htmlspecialchars($r['avg_score'] ?? $r['average'] ?? '') ?></td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="<?= \App\Core\View::baseUrl('/teacher/results/attempts?quiz_id=' . ($r['quiz_id'] ?? $r['id'] ?? '')) ?>">مشاهده</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>