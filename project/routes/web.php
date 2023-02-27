<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewslettersController;

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

Route::get('newsletters', [NewslettersController::class, 'index'])->name('newsletters.index');

Route::get('newsletters/create', [NewslettersController::class, 'create'])->name('newsletters.create');

Route::post('newsletters/store', [NewslettersController::class, 'store'])->name('newsletters.store');

Route::get('newsletters/show/{id}', [NewslettersController::class, 'show'])->name('newsletters.show');

Route::get('newsletters/edit/{id}', [NewslettersController::class, 'edit'])->name('newsletters.edit');

Route::put('newsletters/update', [NewslettersController::class, 'update'])->name('newsletters.update');

Route::get('newsletters/destroy/{id}', [NewslettersController::class, 'destroy'])->name('newsletters.destroy');