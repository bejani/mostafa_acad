<?php
// teacher/quizzes.php
?>
<div class="container mt-4">
    <h3 class="mb-3">آزمون‌های من</h3>
    <a class="btn btn-primary mb-3" href="index.php?route=/teacher/quizzes/create">+ ساخت آزمون جدید</a>

    <?php if (empty($quizzes)): ?>
    <div class="alert alert-warning">هنوز آزمونی ساخته نشده است.</div>
    <?php else: ?>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>عنوان آزمون</th>
                    <th>تاریخ ایجاد</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($quizzes as $q): ?>
                <tr>
                    <td><?= (int)$q['id'] ?></td>
                    <td><?= htmlspecialchars($q['title'] ?? '') ?></td>
                    <td><?= htmlspecialchars($q['created_at'] ?? '') ?></td>
                    <td>
                        <a class="btn btn-sm btn-success"
                            href="index.php?route=/teacher/results&quiz_id=<?= (int)$q['id'] ?>">
                            نتایج
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
</div>