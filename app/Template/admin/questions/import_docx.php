<?php

/** @var array $quiz */ ?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>
            ایمپورت سؤال‌ها از Word (DOCX)
            – آزمون «<?= htmlspecialchars($quiz['title']); ?>»
        </h3>

        <a href="index.php?route=/admin/questions&quiz_id=<?= (int)$quiz['id'] ?>" class="btn btn-secondary">
            بازگشت به لیست سؤالات
        </a>
    </div>

    <div class="card">
        <div class="card-body">

            <form method="post" action="index.php?route=/admin/questions/import-docx&quiz_id=<?= (int)$quiz['id'] ?>"
                enctype="multipart/form-data">

                <input type="hidden" name="quiz_id" value="<?= (int)$quiz['id'] ?>">

                <div class="mb-3">
                    <label class="form-label">فایل Word (DOCX)</label>
                    <input type="file" name="docx" class="form-control" accept=".docx" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">فرمت نمونهٔ سؤالات در Word</label>
                    <pre class="bg-light p-3" style="white-space: pre-wrap; font-family: monospace;">
سؤال نمونه؟
الف) گزینه اول
ب) گزینه دوم
ج) گزینه سوم
د) گزینه چهارم
پاسخ: الف

سؤال بعدی؟
الف) ...
ب) ...
ج) ...
د) ...
پاسخ: ج
                    </pre>
                </div>

                <button type="submit" class="btn btn-primary">
                    شروع ایمپورت
                </button>
            </form>

        </div>
    </div>

</div>