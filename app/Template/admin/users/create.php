<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <title>کاربر جدید</title>
</head>

<body>

    <div class="container mt-4">

        <h3 class="mb-4">ایجاد کاربر جدید</h3>

        <form method="post" action="index.php?route=/admin/users/create">

            <div class="mb-3">
                <label class="form-label">نام</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">نام کاربری</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">رمز عبور</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">نقش</label>
                <select name="role" class="form-select" id="role-select">
                    <option value="student">دانش‌آموز</option>
                    <option value="teacher">معلم</option>
                    <option value="admin">مدیر</option>
                </select>
            </div>

            <div class="mb-3" id="subjects-wrapper">
                <label class="form-label">درس‌ها (برای دانش‌آموز یا معلم)</label>
                <select name="subjects[]" class="form-select" multiple>
                    <?php foreach (($subjects ?? []) as $subject): ?>
                        <option value="<?= (int)$subject['id'] ?>">
                            <?= htmlspecialchars($subject['title'] ?? '') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="form-text">برای انتخاب چند درس Ctrl را نگه دارید.</div>
            </div>

            <button class="btn btn-success">ذخیره</button>
            <a href="index.php?route=/admin/users" class="btn btn-secondary">انصراف</a>

        </form>

    </div>

    <script>
        const roleSel = document.getElementById('role-select');
        const subjWrap = document.getElementById('subjects-wrapper');
        function toggleSubjects() {
            subjWrap.style.display = (roleSel.value === 'student' || roleSel.value === 'teacher') ? 'block' : 'none';
        }
        roleSel.addEventListener('change', toggleSubjects);
        toggleSubjects();
    </script>

</body>

</html>
