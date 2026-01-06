<?php

namespace App\Action\Admin\Results;

use App\Core\Auth;
use App\Core\View;
use App\Domain\AttemptRepository;

class ResultListAction
{
    public function __invoke()
    {
        if (!Auth::isAdmin()) {
            return View::redirect('/login');
        }

        $attemptRepo = new AttemptRepository();
        $rows        = $attemptRepo->adminResults();

        if (($_GET['download'] ?? '') === 'csv') {
            $this->downloadCsv($rows);
        }

        return View::render('admin/results/list.php', [
            'rows' => $rows,
        ]);
    }

    private function downloadCsv(array $rows): void
    {
        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="results.csv"');
        header('Pragma: no-cache');
        header('Expires: 0');

        $out = fopen('php://output', 'w');

        fputcsv($out, [
            'Attempt ID',
            'Quiz ID',
            'Quiz Title',
            'Student ID',
            'Student Name',
            'Username',
            'Score',
            'Started At',
            'Finished At',
            'Duration (sec)',
        ]);

        foreach ($rows as $r) {
            fputcsv($out, [
                $r['attempt_id'] ?? '',
                $r['quiz_id'] ?? '',
                $r['quiz_title'] ?? '',
                $r['user_id'] ?? '',
                $r['student_name'] ?? '',
                $r['student_username'] ?? '',
                $r['score'] ?? '',
                $r['started_at'] ?? '',
                $r['finished_at'] ?? '',
                $r['duration_seconds'] ?? '',
            ]);
        }

        fclose($out);
        exit;
    }
}
