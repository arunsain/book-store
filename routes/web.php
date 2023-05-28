<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookReviewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;


Route::get('/', [BookController::class, 'index'])->name('/');
Route::get('book-detail/{id}', [BookController::class, 'bookDetail'])->name('book-detail');
Route::get('book/create', [BookController::class, 'create'])->name('book.create');
Route::post('book/store', [BookController::class, 'store'])->name('book.store');
Route::get('edit-book/{id}', [BookController::class, 'edit'])->name('edit-book');
Route::put('edit-book/{id}', [BookController::class, 'update'])->name('update-book');

Route::get('category', [CategoryController::class, 'create'])->name('category');
Route::post('category-store', [CategoryController::class, 'store'])->name('category-store');

Route::get('author', [AuthorController::class, 'create'])->name('author');
Route::post('author-store', [AuthorController::class, 'store'])->name('author-store');

Route::get('login', [AuthController::class, 'index'])->name('login')->middleware("guest");
Route::post('post-login', [AuthController::class, 'login'])->name('login.post'); 
Route::get('register', [AuthController::class, 'register'])->name('register')->middleware("guest");
Route::post('register-user', [AuthController::class, 'registerUser'])->name('register-user'); 

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
Route::post('book-review', [BookReviewController::class, 'storeReview'])->name('review.store');
Route::get('add-review', [BookReviewController::class, 'addReview'])->name('add-review');
});