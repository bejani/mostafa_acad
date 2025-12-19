<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">&#1605;&#1588;&#1575;&#1607;&#1583;&#1607; &#1606;&#1578;&#1575;&#1740;&#1580; &#1570;&#1586;&#1605;&#1608;&#1606;&#8204;&#1607;&#1575;</h3>
        <div class="d-flex gap-2">
            <a class="btn btn-success" href="<?= \App\Core\View::baseUrl('/teacher/results/export-csv') ?>">
                <i class="bi bi-download"></i> خروجی CSV
            </a>
            <a class="btn btn-secondary" href="<?= \App\Core\View::baseUrl('/teacher/dashboard') ?>">&#1576;&#1575;&#1586;&#1711;&#1588;&#1578; &#1576;&#1607; &#1583;&#1575;&#1588;&#1576;&#1608;&#1585;&#1583;</a>
        </div>
    </div>

    <?php if (empty($rows)): ?>
        <div class="alert alert-info">&#1607;&#1740;&#1670; &#1606;&#1578;&#1740;&#1580;&#1607;&#8217;&#1575;&#1740; &#1662;&#1740;&#1583;&#1575; &#1606;&#1588;&#1583;.</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>&#1570;&#1586;&#1605;&#1608;&#1606;</th>
                        <th>&#1583;&#1575;&#1606;&#1588;&#8204;&#1570;&#1605;&#1608;&#1586;</th>
                        <th>&#1578;&#1593;&#1583;&#1575;&#1583; &#1578;&#1604;&#1575;&#1588;&#8204;&#1607;&#1575;</th>
                        <th>&#1570;&#1582;&#1585;&#1740;&#1606; &#1606;&#1605;&#1585;&#1607;</th>
                        <th>&#1576;&#1607;&#1578;&#1585;&#1740;&#1606; &#1606;&#1605;&#1585;&#1607;</th>
                        <th>&#1605;&#1740;&#1575;&#1606;&#1711;&#1740;&#1606; &#1606;&#1605;&#1585;&#1607;</th>
                        <th>&#1570;&#1582;&#1585;&#1740;&#1606; &#1586;&#1605;&#1575;&#1606;</th>
                        <th>&#1593;&#1605;&#1604;&#1740;&#1575;&#1578;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $r): ?>
                        <tr>
                            <td><?= htmlspecialchars($r['quiz_title'] ?? '') ?></td>
                            <td><?= htmlspecialchars($r['student_name'] ?? '') ?></td>
                            <td><?= (int)($r['attempts_count'] ?? 0) ?></td>
                            <td><?= isset($r['last_score']) ? number_format((float)$r['last_score'], 1) . '%' : '-' ?></td>
                            <td><?= isset($r['best_score']) ? number_format((float)$r['best_score'], 1) . '%' : '-' ?></td>
                            <td><?= isset($r['avg_score']) ? number_format((float)$r['avg_score'], 1) . '%' : '-' ?></td>
                            <td><?= htmlspecialchars($r['last_time'] ?? '') ?></td>
                            <td class="d-flex gap-2 justify-content-center">
                                <a class="btn btn-sm btn-primary"
                                    href="<?= \App\Core\View::baseUrl('/teacher/results/attempts?quiz_id=' . (int)$r['quiz_id'] . '&user_id=' . (int)$r['user_id']) ?>">
                                    &#1605;&#1588;&#1575;&#1607;&#1583;&#1607; &#1578;&#1604;&#1575;&#1588;&#8204;&#1607;&#1575;
                                </a>
                                <a class="btn btn-sm btn-outline-warning"
                                    href="<?= \App\Core\View::baseUrl('/teacher/results/enable-retake?quiz_id=' . (int)$r['quiz_id'] . '&user_id=' . (int)$r['user_id']) ?>">
                                    &#1601;&#1593;&#1575;&#1604; &#1705;&#1585;&#1583;&#1606; &#1578;&#1604;&#1575;&#1588; &#1583;&#1608;&#1576;&#1575;&#1585;&#1607;
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

</div>