<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>مدیریت محتوا</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand">مدیریت محتوا</span>
            <a href="index.php?route=/admin/dashboard" class="btn btn-secondary">داشبورد</a>
        </div>
    </nav>

    <div class="container mt-4">

        <div class="d-flex justify-content-between mb-3">
            <h3>فهرست محتوا</h3>
            <a href="index.php?route=/admin/contents/create" class="btn btn-primary">افزودن محتوا</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>عنوان</th>
                    <th>نوع</th>
                    <th>دسته</th>
                    <th>لینک / فایل</th>
                    <th>عملیات</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($contents as $c): ?>
                <tr>
                    <td><?= $c['title'] ?></td>
                    <td><?= $c['type'] ?></td>
                    <td><?= $c['category'] ?></td>
                    <td>
                        <?php if ($c['path']): ?>
                        <a href="<?= $c['path'] ?>" target="_blank">دانلود / مشاهده</a>
                        <?php elseif ($c['link_url']): ?>
                        <a href="<?= $c['link_url'] ?>" target="_blank">نمایش</a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="index.php?route=/admin/contents/edit&id=<?= $c['id'] ?>"
                            class="btn btn-sm btn-warning">ویرایش</a>
                        <a href="index.php?route=/admin/contents/delete&id=<?= $c['id'] ?>"
                            onclick="return confirm('حذف شود؟')" class="btn btn-sm btn-danger">حذف</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</body>

</html>