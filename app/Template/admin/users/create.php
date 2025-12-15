<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <title>افزودن کاربر</title>
</head>

<body>

    <div class="container mt-4">

        <h3 class="mb-4">افزودن کاربر</h3>

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
                <select name="role" class="form-select">
                    <option value="student">هنرجو</option>
                    <option value="teacher">معلم</option>
                    <option value="admin">مدیر</option>
                </select>
            </div>

            <button class="btn btn-success">ثبت</button>
            <a href="index.php?route=/admin/users" class="btn btn-secondary">بازگشت</a>

        </form>

    </div>

</body>

</html>