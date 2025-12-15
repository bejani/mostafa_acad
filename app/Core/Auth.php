<?php

namespace App\Core;

class Auth
{
    public static function user()
    {
        return $_SESSION['user'] ?? null;
    }

    public static function check(): bool
    {
        return isset($_SESSION['user']);
    }

    public static function isAdmin(): bool
    {
        return self::check() && $_SESSION['user']['role'] === 'admin';
    }
    public static function isTeacher(): bool
    {
        return self::check() && $_SESSION['user']['role'] === 'teacher';
    }

    public static function isStudent(): bool
    {
        return self::check() && $_SESSION['user']['role'] === 'student';
    }

    public static function id()
    {
        return self::user()['id'] ?? null;
    }

    // خروج
    public static function logout()
    {
        // پاک کردن همه سشن‌ها
        $_SESSION = [];

        // حذف کوکی session
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        session_destroy();
        session_regenerate_id(true);

        // هدایت
        header("Location: " . View::baseUrl('/login'));
        exit;
    }

    // اگر 30 دقیقه غیر فعال بود از سیستم خارج شود
    public static function checkTimeout()
    {
        $lifetime = 1800; // 30 دقیقه

        if (!isset($_SESSION['last_activity'])) {
            $_SESSION['last_activity'] = time();
            return;
        }

        if (time() - $_SESSION['last_activity'] > $lifetime) {
            self::logout();
        }

        $_SESSION['last_activity'] = time();
    }
}
