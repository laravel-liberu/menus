<?php

use Illuminate\Support\Facades\Route;
use LaravelLiberu\Menus\Http\Controllers\Create;
use LaravelLiberu\Menus\Http\Controllers\Destroy;
use LaravelLiberu\Menus\Http\Controllers\Edit;
use LaravelLiberu\Menus\Http\Controllers\ExportExcel;
use LaravelLiberu\Menus\Http\Controllers\InitTable;
use LaravelLiberu\Menus\Http\Controllers\Organize;
use LaravelLiberu\Menus\Http\Controllers\Store;
use LaravelLiberu\Menus\Http\Controllers\TableData;
use LaravelLiberu\Menus\Http\Controllers\Update;

Route::middleware(['api', 'auth', 'core'])
    ->prefix('api/system/menus')
    ->as('system.menus.')
    ->group(function () {
        Route::get('create', Create::class)->name('create');
        Route::post('', Store::class)->name('store');
        Route::get('{menu}/edit', Edit::class)->name('edit');
        Route::patch('{menu}', Update::class)->name('update');
        Route::delete('{menu}', Destroy::class)->name('destroy');
        Route::put('organize', Organize::class)->name('organize');

        Route::get('initTable', InitTable::class)->name('initTable');
        Route::get('tableData', TableData::class)->name('tableData');
        Route::get('exportExcel', ExportExcel::class)->name('exportExcel');
    });
