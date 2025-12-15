<h3>آزمون: <?= $quiz['title'] ?></h3>
<hr>

<form action="<?= \App\Core\View::baseUrl('/student/submit') ?>" method="post">

    <!-- شناسه آزمون -->
    <input type="hidden" name="quiz_id" value="<?= $quiz['id'] ?>">

    <!-- شناسه تلاش (اگر لازم است) -->
    <input type="hidden" name="attempt_id" value="<?= $attempt_id ?>">

    <!-- امتیاز (فعلاً صفر – بعداً در Action محاسبه می‌کنیم) -->
    <input type="hidden" name="score" id="scoreField" value="0">

    <?php foreach ($questions as $i => $q): ?>
    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <strong><?= ($i + 1) ?>) <?= htmlspecialchars($q['body']) ?>
                <small class="text-muted">(ID: <?= (int)$q['id'] ?>)</small>
            </strong>

            <div class="mt-3">

                <?php foreach ($q['options'] as $opt): ?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="q<?= $q['id'] ?>" value="<?= $opt['id'] ?>">
                    <label class="form-check-label">
                        <?= htmlspecialchars($opt['body']) ?>
                    </label>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <button class="btn btn-success w-100">
        ثبت و مشاهده نتیجه
    </button>

</form>