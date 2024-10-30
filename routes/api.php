<?php
//10
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;



Route::post('auth/register', [AuthController::class, 'create']);
Route::post('auth/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
Route::resource('genres', GenreController::class);
Route::resource('books', BookController::class);
Route::get('booksall', [BookController::class, 'all']);
Route::get('booksbygenre', [BookController::class,
 'BooksByGenre']);
 Route::get('auth/logout', [AuthController::class, 'logout']);
});

