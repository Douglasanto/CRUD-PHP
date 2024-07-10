<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [TaskController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/dashboard/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/dashboard/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/dashboard/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/dashboard/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

