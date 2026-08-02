<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// **prefix('dashboard')
Route::controller(DashboardController::class)->group(function () {
    Route::get('/analytics', 'analytics');
});
