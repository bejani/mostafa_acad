<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دانش‌آموزان من</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .subject-card {
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 15px;
        }

        .subject-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px 15px 0 0;
            padding: 1.5rem;
        }

        .student-table {
            border-radius: 0 0 15px 15px;
            overflow: hidden;
        }

        .student-row:hover {
            background-color: #f8f9fa;
        }

        .badge-role {
            font-size: 0.8em;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #6c757d;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
    </style>
</head>

<body>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 mb-0">
                        <i class="bi bi-people-fill me-2"></i>
                        دانش‌آموزان من
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="/teacher/dashboard">داشبورد</a></li>
                            <li class="breadcrumb-item active">دانش‌آموزان</li>
                        </ol>
                    </nav>
                </div>

                <?php if (empty($studentsBySubject)): ?>
                    <div class="card empty-state">
                        <div class="card-body">
                            <i class="bi bi-people"></i>
                            <h4 class="card-title">دانش‌آموزی یافت نشد</h4>
                            <p class="card-text">هیچ دانش‌آموزی به درس‌های شما اختصاص داده نشده است.</p>
                        </div>
                    </div>
                <?php else: ?>
                    <?php foreach ($studentsBySubject as $subject => $students): ?>
                        <div class="card subject-card">
                            <div class="card-header subject-header">
                                <h5 class="mb-0">
                                    <i class="bi bi-book me-2"></i>
                                    <?php echo htmlspecialchars($subject); ?>
                                    <span class="badge bg-light text-dark ms-2"><?php echo count($students); ?> دانش‌آموز</span>
                                </h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0 student-table">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="border-0">#</th>
                                                <th class="border-0">نام کامل</th>
                                                <th class="border-0">نام کاربری</th>
                                                <th class="border-0">تاریخ عضویت</th>
                                                <th class="border-0">وضعیت</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $counter = 1; ?>
                                            <?php foreach ($students as $student): ?>
                                                <tr class="student-row">
                                                    <td><?php echo $counter++; ?></td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-circle bg-primary text-white me-2 d-flex align-items-center justify-content-center" style="width: 35px; height: 35px; border-radius: 50%; font-weight: bold;">
                                                                <?php
                                                                $nameParts = explode(' ', $student['name'] ?? '');
                                                                $initials = '';
                                                                if (!empty($nameParts[0])) $initials .= strtoupper(substr($nameParts[0], 0, 1));
                                                                if (!empty($nameParts[1])) $initials .= strtoupper(substr($nameParts[1], 0, 1));
                                                                echo $initials ?: 'U';
                                                                ?>
                                                            </div>
                                                            <?php echo htmlspecialchars($student['name'] ?? ''); ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="text-muted">@</span><?php echo htmlspecialchars($student['username'] ?? ''); ?>
                                                    </td>
                                                    <td>
                                                        <i class="bi bi-calendar-event me-1"></i>
                                                        <?php echo htmlspecialchars($student['created_at'] ? date('Y/m/d', strtotime($student['created_at'])) : ''); ?>
                                                    </td>
                                                    <td>
                                                        <span class="badge <?php echo ($student['is_active'] ?? 1) ? 'bg-success' : 'bg-danger'; ?> badge-role">
                                                            <i class="bi bi-<?php echo ($student['is_active'] ?? 1) ? 'check-circle-fill' : 'x-circle-fill'; ?> me-1"></i>
                                                            <?php echo ($student['is_active'] ?? 1) ? 'فعال' : 'غیرفعال'; ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>