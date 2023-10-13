<?php

namespace LaravelLiberu\Menus\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelLiberu\Menus\Http\Requests\ValidateMenu;
use LaravelLiberu\Menus\Models\Menu;

class Update extends Controller
{
    public function __invoke(ValidateMenu $request, Menu $menu)
    {
        $menu->update($request->validated());

        return ['message' => __('The menu was successfully updated')];
    }
}
