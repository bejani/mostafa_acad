<h3>تغییر رمز عبور</h3>
<hr>

<?php if (!empty($error)): ?>
<div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

<?php if (!empty($success)): ?>
<div class="alert alert-success"><?= $success ?></div>
<?php endif; ?>

<form method="post" action="index.php?route=/student/change-password">

    <div class="mb-3">
        <label class="form-label">رمز فعلی</label>
        <input type="password" name="current_password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">رمز جدید</label>
        <input type="password" name="new_password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">تکرار رمز جدید</label>
        <input type="password" name="confirm_password" class="form-control" required>
    </div>

    <button class="btn btn-primary w-100">ثبت تغییر</button>
</form>