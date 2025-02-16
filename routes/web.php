<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

// Rute untuk menampilkan formulir tugas
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
// Rute untuk menyimpan tugas baru
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

// Rute untuk memperbarui status tugas
Route::patch('/tasks/{task}/update-status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');

Route::resource('projects', ProjectController::class);

// Rute untuk menampilkan formulir tugas
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

Route::get('/admin', function () {
    return "admin disini";
})->middleware('admin');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/gantt', function () {
    return view('gantt');
})->name('gantt');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
