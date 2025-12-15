<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>ویرایش محتوا</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">

        <h3 class="mb-4">ویرایش محتوا</h3>

        <form method="post" action="index.php?route=/admin/contents/edit" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $content['id'] ?>">

            <div class="mb-3">
                <label class="form-label">عنوان</label>
                <input type="text" name="title" value="<?= $content['title'] ?>" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">نوع محتوا</label>
                <select name="type" id="content-type" class="form-select">
                    <option value="video" <?= $content['type'] == 'video' ? 'selected' : '' ?>>ویدئو</option>
                    <option value="pdf" <?= $content['type'] == 'pdf' ? 'selected' : '' ?>>PDF</option>
                    <option value="word" <?= $content['type'] == 'word' ? 'selected' : '' ?>>Word</option>
                    <option value="excel" <?= $content['type'] == 'excel' ? 'selected' : '' ?>>Excel</option>
                    <option value="powerpoint" <?= $content['type'] == 'powerpoint' ? 'selected' : '' ?>>PowerPoint
                    </option>
                    <option value="link" <?= $content['type'] == 'link' ? 'selected' : '' ?>>لینک معمولی</option>
                    <option value="aparat" <?= $content['type'] == 'aparat' ? 'selected' : '' ?>>Embed آپارات</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">دسته بندی</label>
                <select name="category" class="form-select">
                    <option value="Word" <?= $content['category'] == 'Word' ? 'selected' : '' ?>>Word</option>
                    <option value="Excel" <?= $content['category'] == 'Excel' ? 'selected' : '' ?>>Excel</option>
                    <option value="PowerPoint" <?= $content['category'] == 'PowerPoint' ? 'selected' : '' ?>>PowerPoint
                    </option>
                    <option value="Internet" <?= $content['category'] == 'Internet' ? 'selected' : '' ?>>Internet
                    </option>
                    <option value="عمومی" <?= $content['category'] == 'عمومی' ? 'selected' : '' ?>>عمومی</option>
                </select>
            </div>


            <!-- نمایش مسیر فعلی -->
            <?php if (!empty($content['path'])): ?>
            <div class="alert alert-info">
                <b>فایل/لینک فعلی:</b><br>
                <a href="<?= $content['path'] ?>" target="_blank"><?= $content['path'] ?></a>
            </div>
            <?php endif; ?>

            <!-- آپلود فایل غیر ویدئو -->
            <div class="mb-3 d-none" id="file-wrapper">
                <label class="form-label">آپلود فایل جدید (PDF/Word/Excel/PPT)</label>
                <input type="file" name="file_doc" class="form-control">
            </div>

            <!-- آپلود ویدئو -->
            <div class="mb-3 d-none" id="video-upload-wrapper">
                <label class="form-label">آپلود ویدئوی جدید</label>
                <input type="file" name="file_video" class="form-control">
            </div>

            <!-- لینک آپارات -->
            <div class="mb-3 d-none" id="aparat-wrapper">
                <label class="form-label">لینک آپارات</label>
                <input type="text" name="link_url" value="<?= $content['link_url'] ?>" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">توضیحات</label>
                <textarea name="description" class="form-control"><?= $content['description'] ?></textarea>
            </div>

            <button class="btn btn-primary">ذخیره تغییرات</button>
            <a href="index.php?route=/admin/contents" class="btn btn-secondary">بازگشت</a>

        </form>

    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {

        const typeField = document.getElementById("content-type");
        const fileWrapper = document.getElementById("file-wrapper");
        const videoWrapper = document.getElementById("video-upload-wrapper");
        const aparatWrapper = document.getElementById("aparat-wrapper");

        function updateFields() {
            const value = typeField.value;

            if (value === "video") {
                fileWrapper.classList.add("d-none");
                videoWrapper.classList.remove("d-none");
                aparatWrapper.classList.remove("d-none");
            } else if (value === "aparat") {
                fileWrapper.classList.add("d-none");
                videoWrapper.classList.add("d-none");
                aparatWrapper.classList.remove("d-none");
            } else if (value === "pdf" || value === "word" || value === "excel" || value === "powerpoint") {
                fileWrapper.classList.remove("d-none");
                videoWrapper.classList.add("d-none");
                aparatWrapper.classList.add("d-none");
            } else if (value === "link") {
                fileWrapper.classList.add("d-none");
                videoWrapper.classList.add("d-none");
                aparatWrapper.classList.remove("d-none");
            } else {
                fileWrapper.classList.add("d-none");
                videoWrapper.classList.add("d-none");
                aparatWrapper.classList.add("d-none");
            }
        }

        typeField.addEventListener("change", updateFields);
        updateFields(); // اجرای اولیه برای حالت موجود
    });
    </script>

</body>

</html>