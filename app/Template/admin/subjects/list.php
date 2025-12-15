<?php

/** @var array $subjects */ ?>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>مدیریت درس‌ها</h3>
        <a href="<?= \App\Core\View::baseUrl('/admin/subjects/create') ?>" class="btn btn-success">
            افزودن درس جدید
        </a>
    </div>

    <?php if (empty($subjects)): ?>
        <div class="alert alert-info">هنوز درسی ثبت نشده است.</div>
    <?php else: ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>عنوان درس</th>
                    <th>پایه</th>
                    <th>رشته</th>
                    <th>کد</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($subjects as $i => $s): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= htmlspecialchars($s['title']) ?></td>
                        <td><?= htmlspecialchars($s['grade'] ?? '') ?></td>
                        <td><?= htmlspecialchars($s['major'] ?? '') ?></td>
                        <td><?= htmlspecialchars($s['code'] ?? '') ?></td>
                        <td>
                            <a href="<?= \App\Core\View::baseUrl('/admin/subjects/edit?id=' . (int)$s['id']) ?>"
                                class="btn btn-sm btn-primary">ویرایش</a>
                            <a href="<?= \App\Core\View::baseUrl('/admin/subjects/delete?id=' . (int)$s['id']) ?>"
                                class="btn btn-sm btn-danger" onclick="return confirm('حذف این درس؟');">حذف</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>