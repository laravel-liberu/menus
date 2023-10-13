<?php

namespace LaravelLiberu\Menus\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelLiberu\Menus\Forms\Builders\Menu as Form;
use LaravelLiberu\Menus\Models\Menu;

class Edit extends Controller
{
    public function __invoke(Menu $menu, Form $form)
    {
        return ['form' => $form->edit($menu)];
    }
}
