<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionsController;
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

Route::get('/permission', [PermissionsController::class,"index"]);
Route::post('/permission', [PermissionsController::class,"store"]);
Route::get('/permission/{permissions}', [PermissionsController::class,"show"]);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me',      [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
});