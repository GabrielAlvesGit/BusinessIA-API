<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Use a group to apply the /api prefix to all your routes
Route::prefix('api')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
});
