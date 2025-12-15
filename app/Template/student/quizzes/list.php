<h3 class="mb-4">آزمون‌های فعال</h3>

<table class="table table-bordered table-striped text-center align-middle">
    <thead class="table-dark">
        <tr>
            <th>عنوان</th>
            <th>ماژول</th>
            <th>تعداد سؤال</th>
            <th>زمان</th>
            <th>شروع</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($quizzes as $q): ?>
        <tr>
            <td><?= $q['title'] ?></td>
            <td><?= $q['module'] ?></td>
            <td><?= $q['question_count'] ?></td>
            <td><?= $q['time_limit_seconds'] ?> ثانیه</td>
            <td>
                <a href="<?= \App\Core\View::baseUrl('/student/take&id=' . $q['id']) ?>" class="btn btn-primary">
                    شروع آزمون
                </a>
            </td>
        </tr>
        <?php endforeach; ?>

    </tbody>
</table>