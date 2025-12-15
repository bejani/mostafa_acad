<style>
.dashboard-card {
    padding: 25px;
    border-radius: 18px;
    color: #fff;
    text-align: center;
    cursor: pointer;
    height: 100%;
    transition: .25s ease;
    will-change: transform;
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(6px);
    border: 1px solid rgba(255, 255, 255, 0.15);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

/* افکت بسیار نرم هنگام هاور */
.dashboard-card:hover {
    transform: translateY(-6px) scale(1.03);
    box-shadow: 0 20px 35px rgba(0, 0, 0, 0.2);
}

/* آیکون‌ها */
.icon {
    font-size: 55px;
    margin-bottom: 14px;
    opacity: 0.95;
}

/* عنوان‌ها */
.dashboard-card h5 {
    font-size: 1.35rem;
    font-weight: 700;
    color: #fff;
    margin-bottom: 10px;
}

/* کانتر */
.counter {
    font-size: 2rem;
    font-weight: 800;
    margin-top: 5px;
    opacity: 0.9;
}

/* رنگ‌بندی جذاب‌تر */
.card-1 {
    background: linear-gradient(135deg, #007bff, #335dff);
}

.card-2 {
    background: linear-gradient(135deg, #8a2be2, #6f00ff);
}

.card-3 {
    background: linear-gradient(135deg, #28a745, #00c06b);
}

.card-4 {
    background: linear-gradient(135deg, #ff4757, #ff6b81);
}

/* موبایل */
@media (max-width: 768px) {
    .dashboard-card {
        min-height: 170px;
        padding: 20px;
    }

    .icon {
        font-size: 45px;
    }

    .counter {
        font-size: 1.6rem;
    }

    h5 {
        font-size: 1.15rem;
    }
}
</style>
<div class="row g-4">



    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
        <a href="index.php?route=/student/quizzes" class="text-decoration-none">
            <div class="dashboard-card card-2">
                <div class="icon">📝</div>
                <h5>آزمون‌ها</h5>
                <div class="counter"><?= $quizCount ?></div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
        <a href="index.php?route=/student/results" class="text-decoration-none">
            <div class="dashboard-card card-3">
                <div class="icon">📊</div>
                <h5>نتایج آزمون‌ها</h5>
                <div class="counter"><?= $resultCount ?></div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
        <a href="index.php?route=/student/change-password" class="text-decoration-none">
            <div class="dashboard-card card-4">
                <div class="icon">🔑</div>
                <h5>تغییر رمز</h5>
            </div>
        </a>
    </div>

</div>