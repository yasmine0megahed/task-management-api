<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
// **prefix('task');
Route::controller(TaskController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{task}', 'show');
    Route::put('/{task}', 'update');
    Route::delete('/{task}', 'destroy');
});
