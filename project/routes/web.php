<?php

use App\Http\Controllers\NewslettersController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});


// ADMIN ROUTES

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ADMIN ROUTES

Route::get('newsletters', [NewslettersController::class, 'index'])->name('newsletters.index');

Route::get('newsletters/create', [NewslettersController::class, 'create'])->name('newsletters.create');

Route::post('newsletters/store', [NewslettersController::class, 'store'])->name('newsletters.store');

Route::get('newsletters/show/{id}', [NewslettersController::class, 'show'])->name('newsletters.show');

Route::get('newsletters/edit/{id}', [NewslettersController::class, 'edit'])->name('newsletters.edit');

Route::put('newsletters/update', [NewslettersController::class, 'update'])->name('newsletters.update');

Route::get('newsletters/destroy/{id}', [NewslettersController::class, 'destroy'])->name('newsletters.destroy');