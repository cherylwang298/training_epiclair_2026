<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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

Route::get('/tugas', [TaskController::class, 'index'])->name('tugas.index');
Route::post('/tugas', [TaskController::class, 'store'])->name('tugas.store');
Route::delete('/tugas/{tuga}', [TaskController::class, 'destroy'])->name('tugas.destroy');
Route::get('/tugas/{tuga}/edit', [TaskController::class, 'edit'])->name('tugas.edit');
Route::put('/tugas/{tuga}', [TaskController::class, 'update'])->name('tugas.update');

// Route::get('/tugas', function(){
//     return view ('tugas.tugas');
// });