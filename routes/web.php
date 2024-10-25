<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Models\Book;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('books', BookController::class);

Route::get('books/{book}/confirmDelete', [BookController::class, 'confirmDelete'])->name('books.confirmDelete');
Route::delete('books/{book}', [BookController::class, 'delete'])->name('books.delete');
