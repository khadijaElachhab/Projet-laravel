<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\PublicProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('projects', ProjectController::class);
    Route::resource('skills', SkillController::class);
    Route::get('/pdf/{username}', [PDFController::class, 'generate'])->name('pdf.generate');
    Route::put('/profile/password', [\App\Http\Controllers\Auth\PasswordController::class, 'update'])->name('profile.password');
});

Route::get('/profile/{username}', [PublicProfileController::class, 'show'])->name('profile.show');

require __DIR__.'/auth.php';
