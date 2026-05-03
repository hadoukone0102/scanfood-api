<?php

use Illuminate\Support\Facades\Route;
use Modules\QrCode\app\Http\Controllers\QrCodeController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('qrcodes', QrCodeController::class)->names('qrcode');
});
