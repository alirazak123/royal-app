<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('authors')->group(function () {
    Route::get('/authors-list', [AuthorsController::class, 'index'])->name('authors-list');
    Route::get('/view-author-books/{id}', [AuthorsController::class, 'viewAuthorBooks'])->name('view-author-books');
    Route::get('/delete-author/{id}', [AuthorsController::class, 'deleteAuthor'])->name('delete-author');
    Route::get('/delete-book/{id}', [AuthorsController::class, 'deleteBook'])->name('delete-book');
});


Route::prefix('books')->group(function () {
    Route::get('/show-book', [BooksController::class, 'index'])->name('show-book');
    Route::post('/create-book', [BooksController::class, 'createBook'])->name('create-book');
});


require __DIR__.'/auth.php';
