<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SuratCutiController;
use Illuminate\Support\Facades\Route;

Route::get('', [DashboardController::class,'index'])->name('dashboard');

Route::prefix('staff')->group(function () {
    Route::get('', [StaffController::class,'index'])->name('staff.index');
    Route::post('import', [StaffController::class, 'import'])->name('staff.import');
    Route::get('export', [StaffController::class, 'export'])->name('staff.export');
    Route::get('{id}', [StaffController::class, 'show'])->name('staff.show');
    Route::get('{id}/edit', [StaffController::class, 'edit'])->name('staff.edit');
    Route::put('{id}', [StaffController::class, 'update'])->name('staff.update');
    Route::delete('{id}', [StaffController::class, 'destroy'])->name('staff.destroy');
});

Route::prefix('manage-letter')->group(function () {
    Route::prefix('leave-application-letter')->group(function () {
        Route::get('', [SuratCutiController::class,'index'])->name('leave-application-letter.index');
    });
});
