<?php

/**
 * WEB ROUTES
 * File: routes/web.php
 */

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin Routes (tambahkan middleware auth nanti jika perlu)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/messages', [AdminController::class, 'messages'])->name('messages');
    Route::post('/messages/{id}/read', [AdminController::class, 'markAsRead'])->name('messages.read');
    Route::delete('/messages/{id}', [AdminController::class, 'deleteMessage'])->name('messages.delete');
    
    Route::get('/skills', [AdminController::class, 'skills'])->name('skills');
    Route::get('/projects', [AdminController::class, 'projects'])->name('projects');
    Route::get('/certificates', [AdminController::class, 'certificates'])->name('certificates');
});