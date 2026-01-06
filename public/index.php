<?php



declare(strict_types=1);

use App\Core\Router;

session_start();

// Ensure UTF-8 output so Persian text renders correctly.
header('Content-Type: text/html; charset=UTF-8');

// Autoload
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/../app/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relativeClass = substr($class, $len);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

require __DIR__ . '/../vendor/autoload.php';


// Load app config
require __DIR__ . '/../app/app.php';



// $path = $_GET['route'] ?? '/';
// Raw route may be like "login" or "/login" and may include a query string.
$raw = $_GET['route'] ?? '/';

// Ensure the route string used by Router starts with a leading slash so
// registered routes (which include leading slashes) will match.
// Preserve any query string that may be appended to the route value.
$routeForRouter = $raw;
if ($routeForRouter === '') {
    $routeForRouter = '/';
} elseif ($routeForRouter[0] !== '/') {
    $routeForRouter = '/' . $routeForRouter;
}

// Router: pass the normalized raw route (with leading slash and any query)
$router = new Router($routeForRouter);

// Force layouts for top-level namespaces so teacher pages always use teacher layout,
// admin pages use admin layout, and student pages use student layout.
if (class_exists(\App\Core\View::class)) {
    $prefix = strtolower(trim(explode('?', $routeForRouter)[0]));
    if (str_starts_with($prefix, '/teacher')) {
        \App\Core\View::$forceLayout = 'teacher';
    } elseif (str_starts_with($prefix, '/admin')) {
        \App\Core\View::$forceLayout = 'admin';
    } elseif (str_starts_with($prefix, '/student')) {
        \App\Core\View::$forceLayout = 'student';
    } else {
        \App\Core\View::$forceLayout = null;
    }
}

// تعریف مسیرها
require __DIR__ . '/../app/routes.php';

// اجرا
$response = $router->dispatch();

if (is_string($response)) {
    echo $response;
}
