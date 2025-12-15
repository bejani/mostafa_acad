<h3>داشبورد معلم</h3>

<div class="alert alert-info">
    خوش آمدید <?= htmlspecialchars($user['name'] ?? $user['username']) ?>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">آزمون‌های من</h5>
                <a href="<?= \App\Core\View::baseUrl('teacher/quizzes') ?>" class="btn btn-primary btn-sm">
                    مشاهده
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">نتایج فراگیران</h5>
                <a href="<?= \App\Core\View::baseUrl('teacher/results') ?>" class="btn btn-success btn-sm">
                    مشاهده نتایج
                </a>
            </div>
        </div>
    </div>
</div>