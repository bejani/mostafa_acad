<div class="container">

    <h3 class="mb-4">📦 بک‌آپ‌گیری سیستم</h3>

    <div class="alert alert-success">
        عملیات بک‌آپ با موفقیت انجام شد.
    </div>

    <div class="card p-4">

        <h5>فایل بک‌آپ دیتابیس (SQL):</h5>
        <a class="btn btn-primary mt-2" href="/backups/<?= $backup_sql ?>" download>
            دانلود بک‌آپ دیتابیس
        </a>

        <hr>

        <h5>فایل بک‌آپ محتوای Uploads (ZIP):</h5>
        <a class="btn btn-secondary mt-2" href="/backups/<?= $backup_zip ?>" download>
            دانلود فایل‌های آپلود
        </a>

    </div>

    <a href="/admin" class="btn btn-dark mt-4">بازگشت</a>

</div>