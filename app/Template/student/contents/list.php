<div class="container">

    <h3 class="mb-4">محتواهای آموزشی</h3>

    <?php if (empty($contents)): ?>
        <div class="alert alert-info">هیچ محتوایی برای نمایش وجود ندارد.</div>
    <?php else: ?>

        <div class="row g-4">

            <?php foreach ($contents as $c): ?>

                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm h-100">

                        <div class="card-body">

                            <h5 class="card-title"><?= htmlspecialchars($c['title']) ?></h5>

                            <p class="text-muted">دسته: <?= htmlspecialchars($c['category']) ?></p>

                            <p class="text-muted small">
                                👁️ تعداد بازدید: <strong><?= (int)$c['views'] ?></strong>
                            </p>

                            <?php
                            $type = strtolower($c['type']);
                            $path = trim($c['path']);
                            $link = trim($c['link_url']);

                            $isAparat = str_starts_with($path, 'aparat:') || str_contains($link, 'aparat.com');
                            ?>

                            <?php if ($type === 'video' || $isAparat): ?>

                                <!-- دکمه مشاهده ویدئو -->
                                <a href="index.php?route=/student/content/show&id=<?= $c['id'] ?>"
                                    class="btn btn-primary w-100 mt-3">
                                    مشاهده ویدئو
                                </a>

                            <?php else: ?>

                                <!-- دکمه دانلود فایل -->
                                <a href="index.php?route=/student/content/show&id=<?= $c['id'] ?>"
                                    class="btn btn-success w-100 mt-3">
                                    دانلود فایل
                                </a>

                            <?php endif; ?>

                        </div>

                    </div>
                </div>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>
</div>