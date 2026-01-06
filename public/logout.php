<?php

use App\Core\View; ?>

<?php
session_start();

// خالی کردن سشن
$_SESSION = [];
session_destroy();

// هدایت به صفحه لاگین
header(View::baseUrl('/login'));
exit;