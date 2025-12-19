<?php
// برای اطمینان: اندیس‌های آرایه را منظم می‌کنیم
$answers = array_values($answers ?? []);
?>

<div class="container my-4">

    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <h3 class="mb-0">جزئیات تلاش در آزمون</h3>
        <a href="<?= \App\Core\View::baseUrl('/student/results/quiz?quiz_id=' . (int)$attempt['quiz_id']) ?>"
            class="btn btn-outline-secondary btn-sm">
            ← بازگشت به لیست تلاش‌ها
        </a>
    </div>
    <!-- 🔵 دکمه‌های ناوبری صفحه نتایج -->
    <div class="mt-4 d-flex flex-wrap gap-2 justify-content-start">

        <!-- بازگشت به آزمون‌ها -->
        <a href="<?= \App\Core\View::baseUrl('/student/quizzes') ?>"
            class="btn btn-primary d-flex align-items-center gap-1">
            <span>←</span>
            <span>بازگشت به آزمون‌ها</span>
        </a>

        <!-- تلاش‌های همین آزمون -->
        <a href="<?= \App\Core\View::baseUrl('/student/results/quiz?quiz_id=' . (int)$attempt['quiz_id']) ?>"
            class="btn btn-outline-secondary d-flex align-items-center gap-1">
            <span>📘</span>
            <span>تلاش‌های این آزمون</span>
        </a>

        <!-- نتایج کلی دانش آموز -->
        <a href="<?= \App\Core\View::baseUrl('/student/results') ?>"
            class="btn btn-dark d-flex align-items-center gap-1">
            <span>📊</span>
            <span>نتایج من</span>
        </a>

    </div>


    <div class="row g-3 mb-4">
        <div class="col-md-3 col-6">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <div class="text-muted small">درصد کسب‌شده</div>
                    <div class="fs-4 fw-bold">
                        <?= number_format((float)$attempt['score'], 2) ?>%
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <div class="text-muted small">زمان آزمون</div>
                    <div class="fs-4 fw-bold">
                        <?php
                        $sec = (int)($attempt['duration_seconds'] ?? 0);
                        $min = intdiv($sec, 60);
                        $rem = $sec % 60;
                        echo $min . ' دقیقه و ' . $rem . ' ثانیه';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-4">
            <div class="card text-center shadow-sm border-success">
                <div class="card-body">
                    <div class="text-muted small">پاسخ صحیح</div>
                    <div class="fs-4 fw-bold text-success">
                        <?= (int)$correct_count ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-4">
            <div class="card text-center shadow-sm border-danger">
                <div class="card-body">
                    <div class="text-muted small">پاسخ غلط</div>
                    <div class="fs-4 fw-bold text-danger">
                        <?= (int)$wrong_count ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-4">
            <div class="card text-center shadow-sm border-secondary">
                <div class="card-body">
                    <div class="text-muted small">بی‌پاسخ</div>
                    <div class="fs-4 fw-bold text-secondary">
                        <?= (int)$blank_count ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (empty($answers)): ?>
        <div class="alert alert-info">
            برای این تلاش هیچ پاسخی ثبت نشده است.
        </div>
    <?php else: ?>

        <?php
        $qNum = 1;
        foreach ($answers as $a):
            $selectedIds = json_decode($a['selected_option_ids'], true) ?: [];
            $selectedId  = $selectedIds[0] ?? null;
        ?>
            <div class="card mb-3 shadow-sm">
                <div class="card-body">

                    <h5 class="card-title mb-2">
                        <?= $qNum ?>) <?= htmlspecialchars($a['question_text']) ?>
                        <small class="text-muted">
                            (ID: <?= (int)$a['question_id'] ?>)
                        </small>
                    </h5>

                    <?php if (!empty($a['explanation'])): ?>
                        <p class="text-muted small mb-2">
                            <?= nl2br(htmlspecialchars($a['explanation'])) ?>
                        </p>
                    <?php endif; ?>

                    <ul class="list-group mb-2">
                        <?php foreach ($a['options'] as $op): ?>
                            <?php
                            $isCorrectOption = (int)$op['is_correct'] === 1;
                            $isSelected      = ($selectedId !== null && (int)$selectedId === (int)$op['id']);

                            // کلاس نمایشی
                            $liClass = 'list-group-item d-flex justify-content-between align-items-center';
                            if ($isCorrectOption) {
                                $liClass .= ' list-group-item-success';
                            } elseif ($isSelected && !$isCorrectOption) {
                                $liClass .= ' list-group-item-danger';
                            }
                            ?>
                            <li class="<?= $liClass ?>">
                                <span><?= htmlspecialchars($op['body']) ?></span>
                                <span class="badge bg-light text-dark border">
                                    <?php if ($isCorrectOption): ?>
                                        ✔ گزینه صحیح
                                    <?php endif; ?>
                                    <?php if ($isSelected && !$isCorrectOption): ?>
                                        ✘ انتخاب شما
                                    <?php elseif ($isSelected && $isCorrectOption): ?>
                                        ✔ انتخاب شما
                                    <?php endif; ?>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <?php if ($selectedId === null): ?>
                        <p class="text-muted small mb-0">
                            — این سؤال بدون پاسخ رها شده است.
                        </p>
                    <?php endif; ?>

                </div>
            </div>
        <?php
            $qNum++;
        endforeach;
        ?>

        <div class="mt-3 d-flex justify-content-between">
            <a href="<?= \App\Core\View::baseUrl('/student/results/quiz?quiz_id=' . (int)$attempt['quiz_id']) ?>"
                class="btn btn-outline-secondary">
                ← بازگشت به لیست تلاش‌های این آزمون
            </a>
            <a href="<?= \App\Core\View::baseUrl('/student/results') ?>" class="btn btn-outline-primary">
                ← بازگشت به لیست آزمون‌ها
            </a>
        </div>

    <?php endif; ?>

</div>