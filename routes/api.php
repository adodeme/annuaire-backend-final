<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/profiles', [ProfileController::class, 'index']);
Route::get('/profiles/{id}', [ProfileController::class, 'show']);
Route::get('/sectors', [ProfileController::class, 'sectors']);
Route::get('/stats', [ProfileController::class, 'stats']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/me', [AuthController::class, 'me']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/admin/profiles', [ProfileController::class, 'adminProfiles']);

    Route::put('/admin/profiles/{id}/approve', [ProfileController::class, 'approve']);

    Route::put('/admin/profiles/{id}/reject', [ProfileController::class, 'reject']);

});