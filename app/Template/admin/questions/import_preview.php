<h3>پیش‌نمایش سؤالات استخراج‌شده</h3>
<p>آزمون: <?= $quiz_id ?></p>

<form action="<?= \App\Core\View::baseUrl('/admin/questions/import/confirm') ?>" method="post">

    <?php foreach ($questions as $n => $q): ?>
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5><?= ($n + 1) ?>) <?= htmlspecialchars($q['body']) ?></h5>

                <ul>
                    <?php foreach ($q['options'] as $fa => $opt): ?>
                        <li <?php if ($fa == $q['answer']) echo 'class="text-success fw-bold"'; ?>>
                            <?= $fa ?>) <?= htmlspecialchars($opt) ?>
                            <?php if ($fa == $q['answer']) echo " ✔"; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endforeach; ?>

    <button class="btn btn-success btn-lg">✔ ثبت نهایی</button>
</form>