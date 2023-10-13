<?php

namespace LaravelLiberu\Menus\Forms\Builders;

use LaravelLiberu\Forms\Services\Form;
use LaravelLiberu\Menus\Models\Menu as Model;
use LaravelLiberu\Permissions\Models\Permission;

class Menu
{
    private const TemplatePath = __DIR__.'/../Templates/menu.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = (new Form($this->templatePath()))
            ->options('parent_id', Model::isParent()->get(['id', 'name']))
            ->options('permission_id', Permission::get(['id', 'name']));
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Model $menu)
    {
        return $this->form->edit($menu);
    }

    protected function templatePath(): string
    {
        return self::TemplatePath;
    }
}
