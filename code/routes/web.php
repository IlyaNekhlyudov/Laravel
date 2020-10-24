<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::get('/about', function () {
    return view("about");
});

// новости

Route::get('/news', [NewsController::class, 'all'])->name('news');

Route::get('/news/id/{id}', [NewsController::class, 'one'])->name('news.id');

Route::get('/news/add', [NewsController::class, 'add'])->name('news.add');

Route::get('/categories', [NewsController::class, 'categories'])->name('categories');

Route::get('/categories/{id}', [NewsController::class, 'newsByCategory'])->name('category.id');

// пользователь

Route::get('/user/auth', [UserController::class, 'auth'])->name('auth');

Route::get('/user/hello', [UserController::class, 'hello'])->name('hello');