<?php

namespace App\Action\Auth;

use App\Core\Auth;

class LogoutAction
{
    public function __invoke()
    {
        Auth::logout();
    }
}