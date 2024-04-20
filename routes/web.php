<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/teams', [App\Http\Controllers\TeamController::class, 'index'])->name('team');
    Route::post('store/', [App\Http\Controllers\TeamController::class, 'store'])->name('team.store');
    Route::put('update/{teams}', [App\Http\Controllers\TeamController::class, 'update'])->name('team.update');
    Route::delete('delete/{teams}', [App\Http\Controllers\TeamController::class, 'destroy'])->name('team.destroy');

    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
