<div class="container py-4">

    <h3 class="mb-4">آزمون‌هایی که شرکت کرده‌اید</h3>

    <!-- دکمه بازگشت -->
    <a href="<?= \App\Core\View::baseUrl('/student/dashboard') ?>" class="btn btn-secondary mb-3">
        ← بازگشت به پنل
    </a>


    <div class="row">

        <?php foreach ($quizzes as $q): ?>
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($q['title']) ?></h5>

                        <p class="text-muted mb-3">
                            تعداد تلاش‌ها: <strong><?= $q['attempt_count'] ?></strong>
                        </p>

                        <a class="btn btn-primary w-100"
                            href="<?= \App\Core\View::baseUrl('/student/results/quiz?quiz_id=' . $q['id']) ?>">
                            مشاهده تلاش‌ها
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

</div>