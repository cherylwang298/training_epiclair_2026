<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LombaBasketController;


Route::resource('lomba-basket', LombaBasketController::class);
//Route CRUD lomba basket
//Route::resource('/tugas', LombaBasketController::class);

//Pindah path, ngambil data yang mau ditunjukin
Route::get('/', [BookController::class, 'getBooks'])->name('getBooks');
//Nambah data/terima data
Route::post('/submit', [BookController::class, 'addBook'])->name('addBook');
Route::get('/books/{id}', [BookController::class, 'getDetails'])->name('getDetails');
Route::delete('/delete/books/{id}', [BookController::class, 'deleteBook'])->name('deleteBook');
//Edit data, cth : ganti title 
Route::put('/books/{id}', [BookController::class, 'updateBook'])->name('updateBook');
//Tabel baru => migration
Route::get('/welcome', function(){
    return view ('welcome');
});

Route::get('/tailwind-materi', function(){
    return view('tailwind-materi');});