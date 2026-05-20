<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermsController;
use App\Http\Controllers\RolesPermController;
use App\Http\Controllers\TypesController\TypesUserController;
use Illuminate\Support\Facades\Route;

/*
    * ******************************************  Gestion des Types **********************************************************************
    * @date 
    * @return
    * @message
    * @Author Mr dev
*/
Route::get('types_user', [TypesUserController::class,"index"]);
Route::post('types_user', [TypesUserController::class,"store"]);
Route::get('types_user/{id}', [TypesUserController::class,"show"]);

Route::get('/perms', [PermsController::class,"index"]);
Route::post('/perms', [PermsController::class,"store"]);
Route::get('/perms/{permissions}', [PermsController::class,"show"]);

Route::apiResource('roles', RolesPermController::class);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me',      [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
});