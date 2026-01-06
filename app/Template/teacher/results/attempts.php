<?php

/**
 * Teacher: list attempts for a specific quiz and user
 * Expected variables: $user, $quiz, $attempts (array)
 */
?>

<div class="container">
    <h2>مشاهده تلاش‌ها</h2>

    <?php if ($quiz): ?>
        <div class="mb-3">
            <strong>آزمون:</strong> <?= htmlspecialchars($quiz['title'] ?? $quiz['name'] ?? '') ?>
        </div>
    <?php endif; ?>

    <?php if (empty($attempts)): ?>
        <div class="alert alert-info">هیچ تلاشی یافت نشد.</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>آی‌دی تلاش</th>
                        <th>نام شرکت‌کننده</th>
                        <th>نمره</th>
                        <th>تاریخ</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($attempts as $a): ?>
                        <tr>
                            <td><?= htmlspecialchars($a['id'] ?? '') ?></td>
                            <td><?= htmlspecialchars($a['user_name'] ?? $a['name'] ?? '') ?></td>
                            <td><?= htmlspecialchars($a['score'] ?? $a['result'] ?? '') ?></td>
                            <td><?= htmlspecialchars($a['created_at'] ?? $a['date'] ?? '') ?></td>
                            <td>
                                <a class="btn btn-sm btn-outline-primary" href="<?= \App\Core\View::baseUrl('/teacher/results/attempts?quiz_id=' . ($quiz['id'] ?? $quiz['quiz_id'] ?? '') . '&user_id=' . ($a['user_id'] ?? $a['user'] ?? '')) ?>">جزییات</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

    <a href="<?= \App\Core\View::baseUrl('/teacher/results') ?>" class="btn btn-secondary">بازگشت</a>
</div>