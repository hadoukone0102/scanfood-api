<?php

use Illuminate\Support\Facades\Route;
use Modules\Analytics\app\Http\Controllers\AnalyticsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('analytics', AnalyticsController::class)->names('analytics');
});
