<?php
$c = $content;

$type = strtolower($c['type']);
$path = trim($c['path']);
$link = trim($c['link_url']);

$isAparat = str_starts_with($path, 'aparat:') || str_contains($link, 'aparat.com');
?>

<div class="container">

    <h3 class="mb-3"><?= htmlspecialchars($c['title']) ?></h3>

    <p class="text-muted">
        دسته: <?= htmlspecialchars($c['category']) ?> |
        👁️ بازدید: <?= (int)$c['views'] + 1 ?>
    </p>

    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <?php if ($isAparat): ?>

            <?php
                // استخراج HASH
                if (str_starts_with($path, 'aparat:')) {
                    $hash = substr($path, 7);
                } else {
                    preg_match('~/v/([^/]+)~', $link, $m);
                    $hash = $m[1] ?? null;
                }

                $embed = "https://www.aparat.com/video/video/embed/videohash/$hash/vt/frame";
                ?>

            <div class="ratio ratio-16x9">
                <iframe src="<?= $embed ?>" allowfullscreen></iframe>
            </div>

            <?php elseif ($type === 'video'): ?>

            <video controls class="w-100 mt-3">
                <source src="/download.php?f=<?= e($path) ?>" type="video/mp4">
            </video>

            <?php else: ?>

            <p class="mt-3 text-info">برای دانلود فایل از دکمه زیر استفاده کنید:</p>

            <a href="download.php?f=<?= urlencode($c['path']) ?>" class="btn btn-success" target="_blank">
                دانلود فایل
            </a>


            <?php endif; ?>

            <?php if (!empty($c['description'])): ?>
            <hr>
            <p><?= nl2br(htmlspecialchars($c['description'])) ?></p>
            <?php endif; ?>

        </div>
    </div>

    <a href="index.php?route=/student/contents" class="btn btn-secondary">بازگشت</a>
</div>