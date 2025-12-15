<div class="container mt-4">
    <h3 class="mb-3">افزودن درس جدید</h3>

    <form method="post" action="<?= \App\Core\View::baseUrl('/admin/subjects/create') ?>">

        <div class="mb-3">
            <label class="form-label">عنوان درس</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">پایه (اختیاری)</label>
            <input type="text" name="grade" class="form-control" placeholder="مثلاً 10 یا 11">
        </div>

        <div class="mb-3">
            <label class="form-label">رشته (اختیاری)</label>
            <input type="text" name="major" class="form-control" placeholder="شبکه، کامپیوتر، حسابداری، ...">
        </div>

        <div class="mb-3">
            <label class="form-label">کد درس (اختیاری)</label>
            <input type="text" name="code" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">ثبت</button>
        <a href="<?= \App\Core\View::baseUrl('/admin/subjects') ?>" class="btn btn-secondary">بازگشت</a>
    </form>
</div>