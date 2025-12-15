<div class="container mt-4">
    <h3 class="mb-3">ساخت آزمون جدید</h3>

    <form method="post" action="index.php?route=/teacher/quizzes/create">
        <div class="mb-3">
            <label class="form-label">عنوان آزمون</label>
            <input type="text" name="title" class="form-control" required>
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
                <option value="word">Word</option>
                <option value="excel">Excel</option>
                <option value="powerpoint">PowerPoint</option>
                <option value="access">Access</option>
                <option value="windows">Windows</option>
                <option value="internet">Internet</option>
            </select>
        </div>


        <button class="btn btn-primary">ذخیره آزمون</button>
        <a class="btn btn-secondary" href="index.php?route=/teacher/quizzes">انصراف</a>
    </form>
</div>