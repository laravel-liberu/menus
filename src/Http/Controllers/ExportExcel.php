<?php

namespace LaravelLiberu\Menus\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelLiberu\Menus\Tables\Builders\Menu;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = Menu::class;
}
