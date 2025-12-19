<?php

namespace App\Core;

class View
{

    public static function render(string $template, array $data = [], ?string $layout = 'auto')
    {
        $templateFile = __DIR__ . '/../Template/' . $template;


        if (!file_exists($templateFile)) {
            throw new \Exception("View file not found: $templateFile");
        }

        extract($data);

        ob_start();
        require $templateFile;
        $content = ob_get_clean();

        if ($layout === 'auto') {
            if (strpos($template, 'teacher/') === 0) {
                $layout = 'teacher';
            } elseif (strpos($template, 'student/') === 0) {
                $layout = 'student';
            } elseif (strpos($template, 'auth/') === 0) {
                $layout = 'login';
            } else {
                $layout = 'admin';
            }
        }

        if ($layout === null) {
            return $content;
        }

        $layoutFile = __DIR__ . '/../Template/layouts/' . $layout . '.php';

        if (!file_exists($layoutFile)) {
            throw new \Exception("Layout not found: $layoutFile");
        }

        ob_start();
        require $layoutFile;
        return ob_get_clean();
    }




    public static function baseUrl(string $route = '/')
    {
        // route ورودی مثل: /admin/questions?quiz_id=6
        $route = ltrim($route, '/');

        $path = $route;
        $extraQuery = '';

        // اگر route دارای query بود
        if (strpos($route, '?') !== false) {
            [$path, $extraQuery] = explode('?', $route, 2);
            $path = '/' . ltrim($path, '/');
        } else {
            $path = '/' . $path;
        }

        // تشخیص مسیر اصلی پروژه (برای لوکال و سرور)
        $scriptName = $_SERVER['SCRIPT_NAME'];
        $basePath = str_replace('/index.php', '', $scriptName);

        // ساخت URL پایه
        $url = $basePath . '/index.php?route=' . $path;

        // اگر query وجود داشت، باید به‌صورت & چسبانده شود نه ?
        if ($extraQuery !== '') {
            $url .= '&' . $extraQuery;
        }

        return $url;
    }


    public static function redirect(string $route)
    {
        $url = self::baseUrl($route);
        header("Location: $url");
        exit;
    }
}
