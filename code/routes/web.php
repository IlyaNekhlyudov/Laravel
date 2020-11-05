<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DataOffloadController;
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

Route::get('/json', function () {
    return Response::json([
        'status' => true,
        'data'   => [
            'title' => 'News title',
            'text'  => 'News text',
        ],
    ]);
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/category', [CategoryController::class, 'all'])->name('category');
Route::get('/news/category/{categoryId}', [NewsController::class, 'allByCategory'])->name('category.news');
Route::get('/news/{id}', [NewsController::class, 'one'])->name('news.id');
Route::get('/news', [NewsController::class, 'all'])->name('news');

Route::prefix('/admin')->group(function () {
    Route::resource('news', AdminNewsController::class);
});

Route::resource('feedback', FeedbackController::class)->only([
    'index', 'store', 'create'
]);
Route::resource('request', DataOffloadController::class)->only([
    'index', 'store', 'create'
]);


