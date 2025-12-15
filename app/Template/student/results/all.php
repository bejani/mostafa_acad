<div class="container mt-4">

    <h3 class="mb-4">🎓 نتایج آزمون‌های شما</h3>

    <?php if (empty($attempts)): ?>
        <div class="alert alert-info">
            هنوز در هیچ آزمونی شرکت نکرده‌اید.
        </div>
    <?php else: ?>

        <div class="row">
            <?php foreach ($attempts as $a): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">

                            <!-- عنوان آزمون -->
                            <h5 class="card-title mb-3">
                                <?= htmlspecialchars($a['quiz_title']) ?>
                            </h5>

                            <!-- درصد -->
                            <div class="d-flex align-items-center mb-2">
                                <div class="badge bg-success p-2 me-2">
                                    <?= $a['score'] ?>%
                                </div>
                                <span class="text-muted">درصد کسب‌شده</span>
                            </div>

                            <!-- مدت زمان -->
                            <div class="d-flex align-items-center mb-2">
                                <div class="badge bg-primary p-2 me-2">
                                    <?= $a['duration_seconds'] ?> ثانیه
                                </div>
                                <span class="text-muted">مدت زمان آزمون</span>
                            </div>

                            <!-- تاریخ -->
                            <div class="d-flex align-items-center mb-3">
                                <div class="badge bg-secondary p-2 me-2">
                                    <?= date("Y/m/d", strtotime($a['started_at'])) ?>
                                </div>
                                <span class="text-muted">تاریخ آزمون</span>
                            </div>

                            <!-- دکمه مشاهده -->
                            <a class="btn btn-outline-primary w-100"
                                href="<?= \App\Core\View::baseUrl('/student/results') . '&attempt=' . $a['id'] ?>">
                                مشاهده جزئیات
                            </a>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>
</div>