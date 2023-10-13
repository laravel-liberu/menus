<?php

namespace LaravelLiberu\Menus\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelLiberu\Menus\Models\Menu;

class Destroy extends Controller
{
    public function __invoke(Menu $menu)
    {
        $menu->delete();

        return [
            'message' => __('The menu was successfully deleted'),
            'redirect' => 'system.menus.index',
        ];
    }
}
