<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use Illuminate\Support\Facades\Route;

Route::get('', [DashboardController::class,'index'])->name('dashboard');

Route::prefix('driver')->group(function () {
    Route::get('', [DriverController::class,'index'])->name('driver.index');
    Route::post('import', [DriverController::class,'import'])->name('driver.import');
});
