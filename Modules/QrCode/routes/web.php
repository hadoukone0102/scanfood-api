<?php

use Illuminate\Support\Facades\Route;
use Modules\QrCode\app\Http\Controllers\QrCodeController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('qrcodes', QrCodeController::class)->names('qrcode');
});
