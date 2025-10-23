<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorBookController;


Route:: resource('authors', AuthorController::class);
Route:: resource('books', BookController::class);
Route:: resource('authors-books', AuthorBookController::class);

Route:: get('/test', function () {
    return "Probando el middleware";
})-> middleware('ejemplo');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/jsjs', function () {
        return view('home');
    });
});
