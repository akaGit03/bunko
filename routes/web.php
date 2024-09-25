<?php

use App\Http\Controllers\ProfileController;
use \App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books/index',[BookController::class, 'index'])->name('books.index');
Route::get('/books/create',[BookController::class, 'create'])->name('books.create');
Route::post('/books',[BookController::class, 'store'])->name('books.store');
Route::get('/books/{book}',[BookController::class, 'show'])->name('books.show');
Route::get('/books/{book}/edit',[BookController::class, 'edit'])->name('books.edit');
Route::patch('/books/{book}',[BookController::class, 'update'])->name('books.update');
Route::get('/books/search', [BookController::class, 'search'])->name('books.search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
