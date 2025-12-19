<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>خطا - <?php echo htmlspecialchars($title ?? 'سیستم آموزشی'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .error-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .error-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            padding: 3rem;
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        .error-icon {
            font-size: 4rem;
            color: #dc3545;
            margin-bottom: 1.5rem;
        }

        .error-title {
            color: #dc3545;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .error-message {
            color: #6c757d;
            font-size: 1.1rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .btn-back {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 25px;
            color: white;
            text-decoration: none;
            display: inline-block;
            transition: transform 0.2s;
        }

        .btn-back:hover {
            transform: translateY(-2px);
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="error-container">
        <div class="error-card">
            <div class="error-icon">
                <i class="bi bi-exclamation-triangle-fill"></i>
            </div>
            <h1 class="error-title"><?php echo htmlspecialchars($title ?? 'خطا'); ?></h1>
            <p class="error-message"><?php echo htmlspecialchars($message ?? 'یک خطای غیرمنتظره رخ داده است.'); ?></p>
            <a href="javascript:history.back()" class="btn-back">
                <i class="bi bi-arrow-right me-2"></i>
                بازگشت
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>