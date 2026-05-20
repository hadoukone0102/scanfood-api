<?php

use Illuminate\Support\Facades\Route;
use Modules\Menu\Http\Controllers\MenuController;
use Modules\Menu\Http\Controllers\RepasController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('menus', MenuController::class)->names('menu');
    Route::apiResource('repas', RepasController::class)
        ->parameters(['repas' => 'repas'])
        ->names('repas');
});
