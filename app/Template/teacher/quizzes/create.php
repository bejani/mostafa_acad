<div class="container mt-4">
    <h3 class="mb-3">ساخت آزمون جدید</h3>

    <form method="post" action="index.php?route=/teacher/quizzes/create">
        <div class="mb-3">
            <label class="form-label">عنوان آزمون</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">درس</label>
            <select name="subject_id" class="form-select" required>
                <option value="">انتخاب درس...</option>
                <?php foreach ($subjects as $sub): ?>
                    <option value="<?= (int)$sub['id'] ?>">
                        <?= htmlspecialchars($sub['title']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">تعداد سوال (اختیاری)</label>
            <input type="number" name="question_count" class="form-control" value="0">
        </div>

        <div class="mb-3">
            <label class="form-label">زمان آزمون (ثانیه - اختیاری)</label>
            <input type="number" name="time_limit_seconds" class="form-control" value="0">
        </div>

        <div class="mb-3">
            <label class="form-label">ماژول</label>
            <select name="module" class="form-select">
                <option value="">انتخاب کنید</option>
                <?php foreach ($modules as $key => $label): ?>
                    <option value="<?= htmlspecialchars($key) ?>">
                        <?= htmlspecialchars($label) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" checked>
            <label class="form-check-label" for="is_published">
                انتشار آزمون (قابل مشاهده برای دانش آموزان)
            </label>
        </div>

        <div class="mb-3">
            <label for="max_attempts" class="form-label">حداکثر تعداد دفعات شرکت در آزمون</label>
            <select class="form-select" name="max_attempts" id="max_attempts">
                <option value="1">1 بار (بدون تکرار)</option>
                <option value="2" selected>2 بار</option>
                <option value="3">3 بار</option>
                <option value="5">5 بار</option>
                <option value="10">10 بار</option>
            </select>
            <div class="form-text">دانش‌آموزان حداکثر چند بار می‌توانند این آزمون را بدهند؟</div>
        </div>

        <button class="btn btn-primary">ذخیره آزمون</button>
        <a class="btn btn-secondary" href="index.php?route=/teacher/quizzes">انصراف</a>
    </form>
</div>