<?php

/**
 * API ROUTES
 * File: routes/api.php
 */

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::prefix('v1')->group(function () {
    Route::get('/skills', [ApiController::class, 'skills']);
    Route::get('/certificates', [ApiController::class, 'certificates']);
    Route::get('/projects', [ApiController::class, 'projects']);
    Route::get('/settings', [ApiController::class, 'settings']);
    Route::get('/stats', [ApiController::class, 'stats']);
});