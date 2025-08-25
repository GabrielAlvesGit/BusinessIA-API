<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// <! ----- IGNORE - Rotas de teste --- -->
// Route::get('/users', [UserController::class, 'index']);
// Route::post('/users', [UserController::class, 'store']);

Route::apiResource('/users', UserController::class);
