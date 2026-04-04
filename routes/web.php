<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\MonitoringController;
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

Route::prefix('monitoring')->group(function () {
    Route::prefix('inbound')->group(function () {
        Route::get('', [MonitoringController::class,'indexInbound'])->name('monitoring.inbound.index');
        Route::get('export', [MonitoringController::class,'exportInbound'])->name('monitoring.inbound.export');
        Route::get('create', [MonitoringController::class,'createInbound'])->name('monitoring.inbound.create');
        Route::post('create', [MonitoringController::class,'storeInbound'])->name('monitoring.inbound.store');
        Route::get('{id}/edit', [MonitoringController::class,'editInbound'])->name('monitoring.inbound.edit');
        Route::put('{id}', [MonitoringController::class,'updateInbound'])->name('monitoring.inbound.update');
        Route::delete('{id}', [MonitoringController::class,'destroyInbound'])->name('monitoring.inbound.destroy');
    });
});

Route::prefix('manage-letter')->group(function () {
    Route::prefix('leave-application-letter')->group(function () {
        Route::get('', [SuratCutiController::class,'index'])->name('leave-application-letter.index');
    });
});
