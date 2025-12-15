<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>پنل هنرجو</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand">پنل هنرجو</span>
            <a href="<?= \App\Core\View::baseUrl('/logout') ?>" class="btn btn-outline-light">خروج</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h4 class="mb-3">سلام، <?= $user['name'] ?> عزیز</h4>

        <div class="row g-4 mt-2">
            <?php foreach ($contents as $c): ?>

            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">

                        <h5 class="card-title"><?= $c['title'] ?></h5>
                        <p class="text-muted"><?= $c['category'] ?></p>
                        <p><?= $c['description'] ?></p>

                        <?php if ($c['type'] === 'video'): ?>

                        <!-- دکمه پخش ویدئو در مودال -->
                        <button class="btn btn-primary w-100 open-video" data-bs-toggle="modal"
                            data-bs-target="#videoModal" data-src="<?= $c['path'] ?>">
                            مشاهده ویدئو
                        </button>

                        <?php else: ?>

                        <!-- دکمه دانلود واقعی -->
                        <a href="<?= $c['path'] ?>" class="btn btn-success w-100" download>
                            دانلود فایل
                        </a>

                        <?php endif; ?>

                    </div>
                </div>
            </div>

            <?php endforeach; ?>

        </div>
    </div>

    <!-- Video Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">مشاهده ویدئو</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body p-0">
                    <iframe id="videoFrame" src="" width="100%" height="500" frameborder="0" allowfullscreen></iframe>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    // باز شدن مودال
    document.querySelectorAll('.open-video').forEach(btn => {
        btn.addEventListener('click', function() {
            const videoSrc = this.getAttribute('data-src');
            document.getElementById('videoFrame').src = videoSrc;
        });
    });

    // بستن مودال → توقف ویدئو
    document.getElementById('videoModal').addEventListener('hidden.bs.modal', function() {
        document.getElementById('videoFrame').src = "";
    });
    </script>

</body>

</html>