<?php

namespace App\Action\Teacher\Results;

use App\Core\Auth;
use App\Core\View;
use App\Domain\AttemptRepository;
use App\Domain\UserSubjectRepository;

class TeacherResultExportCsvAction
{
    public function __invoke()
    {
        if (!Auth::isTeacher()) {
            View::redirect('/login');
        }

        $attemptRepo = new AttemptRepository();
        $subjects = (new UserSubjectRepository())->subjectsForUser((int)Auth::id());
        $rows = $attemptRepo->teacherResultsBySubjects($subjects);

        // تنظیم هدرهای HTTP برای دانلود CSV
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="teacher_results_' . date('Y-m-d_H-i-s') . '.csv"');
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        // باز کردن output stream
        $output = fopen('php://output', 'w');

        // نوشتن BOM برای پشتیبانی از فارسی در Excel
        fprintf($output, chr(0xEF) . chr(0xBB) . chr(0xBF));

        // نوشتن هدر CSV
        fputcsv($output, [
            'آزمون',
            'دانش‌آموز',
            'تعداد تلاش‌ها',
            'آخرین نمره',
            'بهترین نمره',
            'میانگین نمره',
            'آخرین زمان'
        ]);

        // نوشتن داده‌ها
        foreach ($rows as $row) {
            fputcsv($output, [
                $row['quiz_title'] ?? '',
                $row['student_name'] ?? '',
                (int)($row['attempts_count'] ?? 0),
                isset($row['last_score']) ? number_format((float)$row['last_score'], 1) . '%' : '-',
                isset($row['best_score']) ? number_format((float)$row['best_score'], 1) . '%' : '-',
                isset($row['avg_score']) ? number_format((float)$row['avg_score'], 1) . '%' : '-',
                $row['last_time'] ?? ''
            ]);
        }

        // بستن output stream
        fclose($output);
        exit;
    }
}
