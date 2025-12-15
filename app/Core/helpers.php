<?php

if (!function_exists('url')) {
    function url(string $path = ''): string
    {
        $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
        $path = ltrim($path, '/');
        return $base . '/' . $path;
    }
}
if (!function_exists('e')) {
    function e($value)
    {
        return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
    }
}
