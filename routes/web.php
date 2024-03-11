<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;

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
    $articles = \App\Models\Article::orderBy('created_at', 'desc')->take(10)->with('authors')->get();
    return view('home', ['articles' => $articles]);
})->name('home');

Route::resource('articles', ArticleController::class);

Route::resource('authors', AuthorController::class);
