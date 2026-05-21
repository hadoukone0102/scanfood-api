<?php

use Illuminate\Support\Facades\Route;
use Modules\Menu\Http\Controllers\MenuController;
use Modules\Menu\Http\Controllers\RepasController;
use Modules\Menu\Http\Controllers\TypeMenuController;


Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('menus', MenuController::class)->names('menu');
    Route::apiResource('repas', RepasController::class)
        ->parameters(['repas' => 'repas'])
        ->names('repas');
         Route::apiResource('type-menus', TypeMenuController::class)->names('type-menus');
         
});
