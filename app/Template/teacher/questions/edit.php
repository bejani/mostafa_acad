<h3 class="mb-4">ویرایش سؤال</h3>

<form method="post" action="index.php?route=/admin/questions/edit">

    <input type="hidden" name="id" value="<?= $question['id'] ?>">
    <input type="hidden" name="quiz_id" value="<?= $question['quiz_id'] ?>">

    <div class="mb-3">
        <label class="form-label">نوع سؤال</label>
        <select name="type" class="form-select">
            <option value="mcq_single" <?= $question['type'] == 'mcq_single' ? 'selected' : '' ?>>تک‌گزینه‌ای</option>
            <option value="mcq_multi" <?= $question['type'] == 'mcq_multi' ? 'selected' : '' ?>>چندگزینه‌ای</option>
            <option value="true_false" <?= $question['type'] == 'true_false' ? 'selected' : '' ?>>صحیح/غلط</option>
            <option value="fill_blank" <?= $question['type'] == 'fill_blank' ? 'selected' : '' ?>>جای خالی</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">متن سؤال</label>
        <textarea name="body" class="form-control" required><?= $question['body'] ?></textarea>
    </div>

    <label class="form-label">گزینه‌ها:</label>

    <?php foreach ($options as $i => $opt): ?>
    <div class="input-group mb-2">
        <input type="text" name="options[]" class="form-control" value="<?= $opt['body'] ?>">
        <span class="input-group-text">
            <input type="checkbox" name="correct[]" value="<?= $i ?>" <?= $opt['is_correct'] ? "checked" : "" ?>>
        </span>
    </div>
    <?php endforeach; ?>

    <!-- گزینه‌ی اضافه اگر کاربر خواست بیشتری بگذارد -->
    <div class="input-group mb-2">
        <input type="text" name="options[]" class="form-control" placeholder="گزینه جدید (اختیاری)">
        <span class="input-group-text"><input type="checkbox" name="correct[]" value="<?= count($options) ?>"></span>
    </div>

    <button class="btn btn-success mt-3">ذخیره تغییرات</button>
    <a href="index.php?route=/admin/questions&quiz_id=<?= $question['quiz_id'] ?>" class="btn btn-secondary mt-3">
        بازگشت
    </a>

</form>