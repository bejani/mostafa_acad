<h3>افزودن سریع سؤال (Paste All-in-One)</h3>

<form method="post" action="<?= \App\Core\View::baseUrl('/admin/questions/create/bulk/save') ?>">

    <label class="mt-3">آزمون:</label>
    <input type="number" name="quiz_id" class="form-control" required>

    <label class="mt-3">متن کامل سؤال + ۴ گزینه + پاسخ:</label>
    <textarea name="bulk_question" rows="10" class="form-control" placeholder="مثال:
برای ایجاد نمودار...
الف گزینه ۱
ب گزینه ۲
ج گزینه ۳
د گزینه ۴
پاسخ: ب"></textarea>

    <button class="btn btn-primary mt-4">ثبت سؤال</button>

</form>