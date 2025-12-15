<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'ورود به سامانه' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            animation: fadeIn .7s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-card {
            width: 100% !important;
            max-width: 100% !important;
            padding: 20px;
            border-radius: 15px;
            background: #fff;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }


        .login-title {
            font-weight: 700;
            color: #333;
        }

        .form-control {
            height: 45px;
            border-radius: 10px;
        }

        .btn-login {
            height: 45px;
            font-size: 1.1rem;
            border-radius: 10px;
            font-weight: bold;
            transition: .25s ease;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, .25);
        }
    </style>
</head>

<body>

    <div class="w-100 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-lg-4 col-md-6 col-12">

            <div class="login-card">
                <h4 class="text-center mb-4 login-title">ورود به سامانه</h4>

                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger text-center"><?= $error ?></div>
                <?php endif; ?>

                <form method="post" action="index.php?route=login">
                    <div class="mb-3">
                        <label class="form-label">نام کاربری</label>
                        <input type="text" name="username" class="form-control form-control-lg">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">رمز عبور</label>
                        <input type="password" name="password" class="form-control form-control-lg">
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-100">ورود</button>
                </form>
            </div>

        </div>
    </div>

</body>

</html>