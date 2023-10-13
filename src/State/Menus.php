<?php

namespace LaravelLiberu\Menus\State;

use LaravelLiberu\Core\Contracts\ProvidesState;
use LaravelLiberu\Menus\Http\Resources\Menu;
use LaravelLiberu\Menus\Services\TreeBuilder;

class Menus implements ProvidesState
{
    public function mutation(): string
    {
        return 'menu/set';
    }

    public function state(): mixed
    {
        return Menu::collection((new TreeBuilder())->handle());
    }
}
