<?php

namespace App\Core;

class Dispatcher
{
    public function dispatch(object $action): void
    {
        $response = $action();
        echo $response;
    }
}