<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'getBooks'])->name('getBooks');
Route::post('/submit', [BookController::class, 'addBook'])->name('addBook');
Route::get('/books/{id}', [BookController::class, 'getDetails'])->name('getDetails');
Route::delete('/delete/books/{id}', [BookController::class, 'deleteBook'])->name('deleteBook');
Route::put('/books/{id}', [BookController::class, 'updateBook'])->name('updateBook');

Route::get('/welcome', function(){
    return view ('welcome');
});

Route::get('/tailwind-materi', function(){
    return view('tailwind-materi');
});

Route::get('/form-template', function(){
    return view('template.form-template');
});

Route::get('/new', function(){
    return view('frontend-training');
});

Route::get('/frontend-traning', function(){
    return view('frontend-traning');
});