<?php

/** @var array $subject */ ?>
<div class="container mt-4">
    <h3 class="mb-3">ویرایش درس</h3>

    <form method="post" action="<?= \App\Core\View::baseUrl('/admin/subjects/edit') ?>">

        <input type="hidden" name="id" value="<?= (int)$subject['id'] ?>">

        <div class="mb-3">
            <label class="form-label">عنوان درس</label>
            <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($subject['title']) ?>"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">پایه</label>
            <input type="text" name="grade" class="form-control"
                value="<?= htmlspecialchars($subject['grade'] ?? '') ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">رشته</label>
            <input type="text" name="major" class="form-control"
                value="<?= htmlspecialchars($subject['major'] ?? '') ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">کد درس</label>
            <input type="text" name="code" class="form-control" value="<?= htmlspecialchars($subject['code'] ?? '') ?>">
        </div>

        <button type="submit" class="btn btn-primary">ذخیره</button>
        <a href="<?= \App\Core\View::baseUrl('/admin/subjects') ?>" class="btn btn-secondary">بازگشت</a>
    </form>
</div>