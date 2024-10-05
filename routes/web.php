<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use \App\Http\Controllers\BookController;
use \App\Http\Controllers\LendingController;
use \App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/** 本のCURD */
Route::resource('/books', BookController::class);
Route::get('/books/search', [BookController::class, 'search'])->name('books.search');

/** 貸出処理 */
Route::post('/books/{book}/lend',[LendingController::class, 'lendBook'])->name('books.lendBook');
Route::post('/books/{book}/return',[LendingController::class, 'returnBook'])->name('books.returnBook');

/** コメント処理 */
Route::post('/books/comment/store',[CommentController::class, 'store'])->name('comment.store');
Route::delete('/books/comment/{comment}/delete',[CommentController::class, 'destroy'])->name('comment.destroy');

/** 要認証ルーティング*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // ダッシュボード
    Route::get('/dashboard/borrowing', [HomeController::class, 'borrows'])->name('home.borrows');
    Route::get('/dashboard/lending', [HomeController::class, 'lends'])->name('home.lends');
    Route::get('/dashboard/index', [HomeController::class, 'index'])->name('home.index');

    // アカウント管理
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
