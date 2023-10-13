<?php

namespace LaravelLiberu\Menus\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelLiberu\Menus\Forms\Builders\Menu;

class Create extends Controller
{
    public function __invoke(Menu $form)
    {
        return ['form' => $form->create()];
    }
}
