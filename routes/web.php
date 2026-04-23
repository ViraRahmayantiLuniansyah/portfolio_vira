<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Contact
Route::post('/contact', [HomeController::class, 'send'])->name('contact.send');

// ================= ADMIN =================
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // MESSAGES
    Route::get('/messages', [AdminController::class, 'messages'])->name('messages');
    Route::post('/messages/{id}/read', [AdminController::class, 'markAsRead'])->name('messages.read');
    Route::delete('/messages/{id}', [AdminController::class, 'deleteMessage'])->name('messages.delete');

    // SKILLS CRUD
    Route::get('/skills', [AdminController::class, 'skills'])->name('skills');
    Route::post('/skills', [AdminController::class, 'storeSkill'])->name('skills.store');
    Route::put('/skills/{id}', [AdminController::class, 'updateSkill'])->name('skills.update');
    Route::delete('/skills/{id}', [AdminController::class, 'deleteSkill'])->name('skills.delete');

    // PROJECTS CRUD
    Route::get('/projects', [AdminController::class, 'projects'])->name('projects');
    Route::post('/projects', [AdminController::class, 'storeProject'])->name('projects.store');
    Route::put('/projects/{id}', [AdminController::class, 'updateProject'])->name('projects.update');
    Route::delete('/projects/{id}', [AdminController::class, 'deleteProject'])->name('projects.delete');

    // CERTIFICATES CRUD
    Route::get('/certificates', [AdminController::class, 'certificates'])->name('certificates');
    Route::post('/certificates', [AdminController::class, 'storeCertificate'])->name('certificates.store');
    Route::put('/certificates/{id}', [AdminController::class, 'updateCertificate'])->name('certificates.update');
    Route::delete('/certificates/{id}', [AdminController::class, 'deleteCertificate'])->name('certificates.delete');
});