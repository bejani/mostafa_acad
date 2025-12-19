<?php
// teacher/quizzes.php
?>
<div class="container mt-4">
    <h3 class="mb-3">آزمون‌های من</h3>
    <a class="btn btn-primary mb-3" href="index.php?route=/teacher/quizzes/create">+ آزمون جدید</a>

    <?php if (empty($quizzes)): ?>
        <div class="alert alert-warning">هیچ آزمونی ثبت نشده است.</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>عنوان آزمون</th>
                        <th>تاریخ ایجاد</th>
                        <th>تکرار</th>
                        <th>اقدامات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($quizzes as $q): ?>
                        <tr>
                            <td><?= (int)$q['id'] ?></td>
                            <td><?= htmlspecialchars($q['title'] ?? '') ?></td>
                            <td><?= htmlspecialchars($q['created_at'] ?? '') ?></td>
                            <td>
                                حداکثر <?php echo (int)($q['max_attempts'] ?? 1); ?> بار
                                <a href="index.php?route=/teacher/quizzes/toggle-retake&id=<?= (int)$q['id'] ?>" class="btn btn-sm btn-warning ms-2">
                                    تغییر
                                </a>
                            </td>
                            <td class="d-flex gap-2 justify-content-center">
                                <a class="btn btn-sm btn-info"
                                    href="index.php?route=/teacher/questions&quiz_id=<?= (int)$q['id'] ?>">
                                    سوالات
                                </a>
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