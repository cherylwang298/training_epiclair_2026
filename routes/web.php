<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;

Route::get('/', [BookController::class, 'getBooks'])->name('getBooks');
Route::post('/submit', [BookController::class, 'addBook'])->name('addBook');
Route::get('/books/{id}', [BookController::class, 'getDetails'])->name('getDetails');
Route::delete('/delete/books/{id}', [BookController::class, 'deleteBook'])->name('deleteBook');
Route::put('/books/{id}', [BookController::class, 'updateBook'])->name('updateBook');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/tailwind-materi', function () {
    return view('tailwind-materi');
});

Route::get('/form-template', function () {
    return view('template.form-template');
});

Route::get('/new', function () {
    return view('frontend-training');
});


// Route::get('/tugas', function () {
//     return view('tugas.tugas');
// });

Route::prefix('tugas')
    ->name('members.')
    ->controller(MemberController::class)
    ->group(function () {

        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/view/{id}', 'view')->name('view');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
