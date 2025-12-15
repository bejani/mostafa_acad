<?php

/** @var array|null $quiz */ ?>
<?php /** @var array $items */ ?>
<?php /** @var string $items_json */ ?>
<?php /** @var int $quiz_id */ ?>
<?php /** @var array $warnings */ ?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>
            پیش‌نمایش سؤالات استخراج‌شده از Word
            <?php if ($quiz): ?>
                – آزمون «<?= htmlspecialchars($quiz['title']); ?>»
            <?php endif; ?>
        </h3>

        <a href="index.php?route=/admin/questions&quiz_id=<?= (int)$quiz_id; ?>" class="btn btn-secondary">
            بازگشت به لیست سؤالات
        </a>
    </div>

    <?php if (!empty($warnings)): ?>
        <div class="alert alert-warning">
            <strong>هشدارها:</strong>
            <ul class="mb-0">
                <?php foreach ($warnings as $w): ?>
                    <li><?= htmlspecialchars($w); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (empty($items)): ?>
        <div class="alert alert-danger">
            هیچ سؤالی از فایل Word استخراج نشد. لطفاً فرمت خطوط و نمونهٔ راهنما را بررسی کنید.
        </div>
    <?php else: ?>

        <form method="post" action="index.php?route=/admin/questions/import-docx&quiz_id=<?= (int)$quiz_id; ?>">
            <input type="hidden" name="quiz_id" value="<?= (int)$quiz_id; ?>">
            <input type="hidden" name="confirm" value="1">
            <textarea name="items"
                style="display:none;"><?= htmlspecialchars($items_json, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></textarea>

            <div class="card mb-3">
                <div class="card-body">
                    <p class="mb-2">
                        لطفاً سؤالات استخراج‌شده را بررسی کنید. در صورت تأیید، روی دکمه
                        <strong>«تأیید و ثبت در بانک سؤالات»</strong>
                        کلیک کنید.
                    </p>
                    <button type="submit" class="btn btn-success">
                        تأیید و ثبت در بانک سؤالات
                    </button>
                </div>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width:50px;">#</th>
                        <th>متن سؤال</th>
                        <th>گزینه‌ها (گزینه صحیح با ✳ مشخص شده)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $idx => $item): ?>
                        <tr>
                            <td><?= $idx + 1; ?></td>
                            <td><?= nl2br(htmlspecialchars($item['question'])); ?></td>
                            <td>
                                <ol style="margin:0; padding-left:1.5rem;">
                                    <?php
                                    $opts   = $item['options'] ?? [];
                                    $ci     = (int)($item['correct_index'] ?? -1);
                                    $labels = ['الف', 'ب', 'ج', 'د'];
                                    foreach ($opts as $k => $optText):
                                        $label  = $labels[$k] ?? ($k + 1);
                                        $isCorr = ($k === $ci);
                                    ?>
                                        <li>
                                            <?= $label ?>)
                                            <?= htmlspecialchars($optText); ?>
                                            <?php if ($isCorr): ?>
                                                <strong> ✳</strong>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ol>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="mt-3 mb-5">
                <button type="submit" class="btn btn-success">
                    تأیید و ثبت در بانک سؤالات
                </button>
                <a href="index.php?route=/admin/questions/import-docx&quiz_id=<?= (int)$quiz_id; ?>"
                    class="btn btn-outline-secondary ms-2">
                    بازگشت و انتخاب فایل دیگر
                </a>
            </div>
        </form>

    <?php endif; ?>

</div>