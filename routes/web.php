<?php

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



Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\PostsController::class, 'index'])->name('home');
    Route::get('/users/{user_id}', [App\Http\Controllers\PostsController::class, 'show'])->name('show');
    Route::get('/edit', [App\Http\Controllers\PostsController::class, 'edit'])->name('edit');
    Route::post('/users/update', [App\Http\Controllers\PostsController::class, 'update'])->name('update');
    // ポスト投稿、削除機能
    Route::get('/posts/new', [App\Http\Controllers\PostsController::class, 'new'])->name('new');
    Route::post('/posts', [App\Http\Controllers\PostsController::class, 'store'])->name('store');
    Route::get('/delete/{post_id}', [App\Http\Controllers\PostsController::class, 'delete'])->name('delete');
    // いいね機能
    Route::get('/posts/{post_id}/likes', [App\Http\Controllers\LikesController::class, 'store'])->name('store');
    Route::get('/likes/{like_id}', [App\Http\Controllers\LikesController::class, 'delete'])->name('delete');
    // コメント機能
    Route::post('/posts/{comment_id}/comments', [App\Http\Controllers\CommentsController::class, 'store'])->name('store');
    Route::get('/comments/{comment_id}', [App\Http\Controllers\CommentsController::class, 'delete'])->name('delete');

});
