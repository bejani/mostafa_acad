<?php

namespace App\Responder;

use App\Core\View;

class HtmlResponder
{
    public function render(string $template, array $data = []): string
    {
        return View::render($template, $data);
    }
}
