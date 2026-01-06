<?php

namespace App\Core;

class View
{
    /**
     * If set, this layout will be forced for all renders (useful for route-based overrides)
     * @var string|null
     */
    public static ?string $forceLayout = null;
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

        // Ensure UTF-8 headers and internal encoding so templates render Persian correctly
        if (!headers_sent()) {
            header('Content-Type: text/html; charset=utf-8');
        }
        if (function_exists('mb_internal_encoding')) {
            mb_internal_encoding('UTF-8');
        }
        if (function_exists('mb_http_output')) {
            mb_http_output('UTF-8');
        }

        ob_start();
        require $templateFile;
        $content = ob_get_clean();

        // If a global forceLayout is set (e.g. by public/index.php based on route), use it
        if (self::$forceLayout !== null) {
            $layout = self::$forceLayout;
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
