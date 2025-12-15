<h3>نتیجه آزمون</h3>
<p>درصد کسب‌شده: <strong><?= $attempt['score'] ?>%</strong></p>
<p>مدت زمان آزمون: <strong><?= round($attempt['duration_seconds']/60, 1) ?> دقیقه</strong></p>

<hr>

<h4>پاسخ‌های شما</h4>

<?php
// گروه کردن نتایج بر اساس question
$grouped = [];
foreach ($answers as $row) {
    $qid = $row['question_id'];
    if (!isset($grouped[$qid])) {
        $grouped[$qid] = [
            'question_text' => $row['question_text'],
            'is_correct' => $row['is_correct'],
            'selected' => json_decode($row['selected_option_ids'], true),
            'options' => []
        ];
    }
    $grouped[$qid]['options'][] = [
        'id' => $row['option_id'],
        'body' => $row['option_body'],
        'is_correct' => $row['option_is_correct']
    ];
}
?>

<?php foreach ($grouped as $q): ?>
<div class="card mb-3 <?= $q['is_correct'] ? 'border-success' : 'border-danger' ?>">
    <div class="card-body">
        <p><strong>سؤال:</strong> <?= e($q['question_text']) ?></p>

        <p>
            <strong>وضعیت پاسخ:</strong>
            <?php if ($q['is_correct']): ?>
            <span class="text-success">درست ✓</span>
            <?php else: ?>
            <span class="text-danger">غلط ✗</span>
            <?php endif; ?>
        </p>

        <ul>
            <?php foreach ($q['options'] as $op): ?>
            <li <?php if ($op['id'] == $q['selected'][0]): ?> style="font-weight:bold;" <?php endif; ?>>
                <?= e($op['body']) ?>

                <?php if ($op['is_correct']): ?>
                <span class="text-success">(پاسخ صحیح)</span>
                <?php endif; ?>

                <?php if ($op['id'] == $q['selected'][0] && !$op['is_correct']): ?>
                <span class="text-danger">(پاسخ شما)</span>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ul>

    </div>
</div>
<?php endforeach; ?>