<h3 class="mb-4">افزودن سؤال جدید</h3>

<form method="post" action="index.php?route=/admin/questions/create">

    <input type="hidden" name="quiz_id" value="<?= $quiz_id ?>">

    <div class="mb-3">
        <label class="form-label">نوع سؤال</label>
        <select class="form-select" name="type" id="q-type">
            <option value="mcq_single">تک گزینه‌ای</option>
            <option value="mcq_multi">چند گزینه‌ای</option>
            <option value="true_false">صحیح / غلط</option>
            <option value="fill_blank">جای خالی</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">متن سؤال</label>
        <textarea class="form-control" name="body" required></textarea>
    </div>

    <div id="options-area">
        <!-- گزینه‌ها -->
        <label class="form-label">گزینه‌ها:</label>

        <?php for ($i = 0; $i < 4; $i++): ?>
        <div class="input-group mb-2">
            <input type="text" class="form-control" name="options[]" placeholder="گزینه <?= ($i + 1) ?>">
            <span class="input-group-text">
                <input type="checkbox" name="correct[]" value="<?= $i ?>">
            </span>
        </div>
        <?php endfor; ?>
    </div>

    <button class="btn btn-success mt-3">ذخیره سؤال</button>
    <a href="index.php?route=/admin/questions&quiz_id=<?= $quiz_id ?>" class="btn btn-secondary mt-3">بازگشت</a>
</form>