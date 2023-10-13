<?php

namespace LaravelLiberu\Menus\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelLiberu\Menus\Http\Requests\ValidateMenu;
use LaravelLiberu\Menus\Models\Menu;

class Store extends Controller
{
    public function __invoke(ValidateMenu $request, Menu $menu)
    {
        $menu->fill($request->validated())->save();

        return [
            'message' => __('The menu was created!'),
            'redirect' => 'system.menus.edit',
            'param' => ['menu' => $menu->id],
        ];
    }
}
