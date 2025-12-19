<style>
    .dashboard-card {
        padding: 25px;
        border-radius: 15px;
        color: #fff;
        text-align: center;
        transition: .3s ease;
        cursor: pointer;
    }

    .dashboard-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, .2);
    }

    .icon {
        font-size: 50px;
        margin-bottom: 15px;
        transition: .3s;
    }

    .dashboard-card:hover .icon {
        transform: scale(1.15) rotate(3deg);
    }

    /* رنگ‌های ملایم مدیریتی */
    .c1 {
        background: linear-gradient(45deg, #0d6efd, #3c8dfd);
    }

    .c2 {
        background: linear-gradient(45deg, #6f42c1, #9256d8);
    }

    .c3 {
        background: linear-gradient(45deg, #198754, #25a469);
    }

    .c4 {
        background: linear-gradient(45deg, #fd7e14, #f4a261);
    }

    .c5 {
        background: linear-gradient(45deg, #20c997, #2dd4bf);
    }
</style>

<h3 class="mb-4 fw-bold">سلام، <?= htmlspecialchars($user['name'] ?? '') ?> عزیز 👋</h3>

<div class="row g-4">


    <div class="col-md-4 col-12">
        <a href="<?= \App\Core\View::baseUrl('/admin/quizzes') ?>" class="text-decoration-none">
            <div class="dashboard-card c2">
                <div class="icon">📝</div>
                <h4>مدیریت آزمون‌ها</h4>
                <p class="mt-2">ایجاد، ویرایش و حذف آزمون‌ها و سوالات</p>
            </div>
        </a>
    </div>

    <div class="col-md-4 col-12">
        <a href="<?= \App\Core\View::baseUrl('/admin/users') ?>" class="text-decoration-none">
            <div class="dashboard-card c3">
                <div class="icon">👥</div>
                <h4>مدیریت کاربران</h4>
                <p class="mt-2">افزودن کاربران، نقش‌ها و مدیریت دانش آموزان</p>
            </div>
        </a>
    </div>

    <div class="col-md-4 col-12">
        <a href="<?= \App\Core\View::baseUrl('/admin/subjects') ?>" class="text-decoration-none">
            <div class="dashboard-card c4">
                <div class="icon">📚</div>
                <h4>مدیریت درس‌ها</h4>
                <p class="mt-2">تعریف، ویرایش و حذف درس‌ها برای اختصاص به معلمان و دانش‌آموزان.</p>
            </div>
        </a>
    </div>

    <div class="col-md-4 col-12">
        <a href="<?= \App\Core\View::baseUrl('/admin/results') ?>" class="text-decoration-none">
            <div class="dashboard-card c5">
                <div class="icon">📊</div>
                <h4>نتایج آزمون‌ها</h4>
                <p class="mt-2">مشاهده و پایش نتایج تمام آزمون‌ها در کل سامانه.</p>
            </div>
        </a>
    </div>

</div>