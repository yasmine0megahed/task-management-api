<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
// **prefix('project')
Route::controller(ProjectController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{project}', 'show');
    Route::put('/{project}', 'update');
    Route::delete('/{project}', 'destroy');
});
