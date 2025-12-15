<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>افزودن محتوا</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">

        <h3 class="mb-4">افزودن محتوا</h3>

        <form method="post" action="index.php?route=/admin/contents/create" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label">عنوان</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">نوع محتوا</label>
                <select name="type" id="content-type" class="form-select" required>
                    <option value="">انتخاب کنید...</option>
                    <option value="video">ویدئو</option>
                    <option value="pdf">PDF</option>
                    <option value="word">Word</option>
                    <option value="excel">Excel</option>
                    <option value="powerpoint">PowerPoint</option>
                    <option value="link">لینک معمولی</option>
                    <option value="aparat">Embed آپارات</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">دسته بندی</label>
                <select name="category" class="form-select">
                    <option value="Word">Word</option>
                    <option value="Excel">Excel</option>
                    <option value="PowerPoint">PowerPoint</option>
                    <option value="Internet">Internet</option>
                    <option value="عمومی">عمومی</option>
                </select>
            </div>

            <!-- آپلود فایل‌های غیر ویدئویی -->
            <div class="mb-3 d-none" id="file-wrapper">
                <label class="form-label">آپلود فایل (PDF, Word, Excel, PPT)</label>
                <input type="file" name="file_doc" class="form-control">
            </div>

            <!-- آپلود ویدئو -->
            <div class="mb-3 d-none" id="video-upload-wrapper">
                <label class="form-label">آپلود فایل ویدئو</label>
                <input type="file" name="file_video" class="form-control">
            </div>

            <!-- لینک آپارات -->
            <div class="mb-3 d-none" id="aparat-wrapper">
                <label class="form-label">آدرس ویدئوی آپارات</label>
                <input type="text" name="link_url" class="form-control" placeholder="https://www.aparat.com/v/...">
            </div>

            <div class="mb-3">
                <label class="form-label">توضیحات</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <button class="btn btn-primary">ثبت</button>
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

            // حالت ویدئو
            if (value === "video") {
                fileWrapper.classList.add("d-none");
                videoWrapper.classList.remove("d-none");
                aparatWrapper.classList.remove("d-none");
            }
            // حالت embed آپارات
            else if (value === "aparat") {
                fileWrapper.classList.add("d-none");
                videoWrapper.classList.add("d-none");
                aparatWrapper.classList.remove("d-none");
            }
            // حالت فایل‌های معمولی
            else if (value === "pdf" || value === "word" || value === "excel" || value === "powerpoint") {
                fileWrapper.classList.remove("d-none");
                videoWrapper.classList.add("d-none");
                aparatWrapper.classList.add("d-none");
            }
            // حالت لینک ساده
            else if (value === "link") {
                fileWrapper.classList.add("d-none");
                videoWrapper.classList.add("d-none");
                aparatWrapper.classList.remove("d-none");
            }
            // حالت خالی
            else {
                fileWrapper.classList.add("d-none");
                videoWrapper.classList.add("d-none");
                aparatWrapper.classList.add("d-none");
            }
        }

        typeField.addEventListener("change", updateFields);
    });
    </script>

</body>

</html>