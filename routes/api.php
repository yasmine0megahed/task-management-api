<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// *** AUTH api routes *** //
require __DIR__ . '/auth.php';

Route::middleware('auth:sanctum')->group(function () {
    // *** PROJECTS api routes *** //
    Route::prefix('project')->group(function () {
        require __DIR__ . '/project.php';
    });

    // *** tasks api routes *** //
    Route::prefix('task')->group(function () {
        require __DIR__ . '/task.php';
    });
    
    // ***dashboard api routes *** //
    Route::prefix('dashboard')->middleware('admin')->group(function () {
        require __DIR__ . '/dashboard.php';
    });
});
