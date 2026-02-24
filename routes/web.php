<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RatingController;

Route::get('/', [BookController::class, 'getBooks'])->name('booksPage');

Route::post('/submit', [BookController::class, 'addBook'])->name('addBook');

Route::get('/books/{id}/rating', [BookController::class, 'ratingPage'])->name('ratingPage');
Route::post('/books/{id}/rating', [RatingController::class, 'store'])->name('storeRating');
Route::put('/ratings/{id}', [RatingController::class, 'update'])->name('updateRating');
Route::delete('/ratings/{id}', [RatingController::class, 'destroy'])->name('deleteRating');

Route::get('/books/{id}', [BookController::class, 'getDetails']);
Route::put('/books/{id}', [BookController::class, 'updateBook']);
Route::delete('/delete/books/{id}', [BookController::class, 'deleteBook']);
