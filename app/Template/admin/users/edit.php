<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <title>ویرایش کاربر</title>
</head>

<body>

    <div class="container mt-4">

        <h3 class="mb-4">ویرایش کاربر</h3>

        <form method="post" action="index.php?route=/admin/users/edit">

            <input type="hidden" name="id" value="<?= $user['id'] ?>">

            <div class="mb-3">
                <label class="form-label">نام</label>
                <input type="text" name="name" value="<?= $user['name'] ?>" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">نام کاربری</label>
                <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">رمز عبور جدید (اختیاری)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">نقش</label>
                <select name="role" class="form-select">
                    <option value="student" <?= $user['role'] == 'student' ? 'selected' : '' ?>>دانش آموز</option>
                    <option value="teacher" <?= $user['role'] == 'teacher' ? 'selected' : '' ?>>مربی</option>
                    <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>مدیر</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">درس‌ها (فقط برای نقش مربی)</label>
                <select name="subjects[]" class="form-select" multiple>
                    <?php foreach ($subjects as $subject): ?>
                        <option value="<?= $subject['id'] ?>" <?= in_array($subject['id'], $userSubjectIds) ? 'selected' : '' ?>>
                            <?= $subject['title'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">وضعیت</label>
                <select name="is_active" class="form-select">
                    <option value="1" <?= $user['is_active'] ? 'selected' : '' ?>>فعال</option>
                    <option value="0" <?= !$user['is_active'] ? 'selected' : '' ?>>غیرفعال</option>
                </select>
            </div>

            <button class="btn btn-primary">ذخیره</button>
            <a href="index.php?route=/admin/users" class="btn btn-secondary">بازگشت</a>

        </form>

    </div>

</body>

</html>