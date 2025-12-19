<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <title>مدیریت کاربران</title>
</head>

<body class="bg-light">

    <div class="container mt-4">

        <div class="d-flex justify-content-between mb-3">
            <h3>مدیریت کاربران</h3>
            <a href="index.php?route=/admin/users/create" class="btn btn-primary">افزودن کاربر</a>
        </div>

        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>نام</th>
                    <th>نام کاربری</th>
                    <th>نقش</th>
                    <th>درس‌ها</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                </tr>
            </thead>

            <?php foreach ($users as $u): ?>
                <tr>
                    <td><?= $u['name'] ?></td>
                    <td><?= $u['username'] ?></td>
                    <td>
                        <?php
                        echo match ($u['role']) {
                            'admin'   => 'مدیر',
                            'teacher' => 'مربی',
                            'student' => 'دانش آموز',
                            default   => 'نامشخص',
                        };
                        ?>
                    </td>
                    <td>
                        <?php if (!empty($u['subjects'])): ?>
                            <?= implode(', ', $u['subjects']) ?>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td>
                        <?= $u['is_active'] ? 'فعال' : 'غیرفعال' ?>
                    </td>
                    <td>
                        <a href="index.php?route=/admin/users/edit&id=<?= $u['id'] ?>"
                            class="btn btn-warning btn-sm">ویرایش</a>
                        <a href="index.php?route=/admin/users/toggle&id=<?= $u['id'] ?>" class="btn btn-info btn-sm">تغییر
                            وضعیت</a>
                        <a href="index.php?route=/admin/users/delete&id=<?= $u['id'] ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('حذف شود؟')">حذف</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>

    </div>

</body>

</html>