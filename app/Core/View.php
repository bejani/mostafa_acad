<?php

namespace App\Core;

class View
{
    /**
     * رندر صفحه با لی‌اوت
     */
    public static function render(string $template, array $data = [], ?string $layout = 'admin')
    {
        $templateFile = __DIR__ . '/../Template/' . $template;


        if (!file_exists($templateFile)) {
            throw new \Exception("View file not found: $templateFile");
        }

        extract($data);

        ob_start();
        require $templateFile;
        $content = ob_get_clean();

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
            [$path, $extraQuery] = explode('?', $route, 2); // جدا کردن مسیر از query
            $path = '/' . ltrim($path, '/');
        } else {
            $path = '/' . $path;
        }

        // تشخیص مسیر اصلی پروژه (برای لوکال و سرور)
        $scriptName = $_SERVER['SCRIPT_NAME']; // مثلا /tvto_portal/public/index.php
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
