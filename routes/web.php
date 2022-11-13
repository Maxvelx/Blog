<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(['namespace' => '\App\Http\Controllers\Blog', 'prefix' => 'blog'], static function () {
    Route::get('/', IndexController::class)->name('blog.index');
    Route::get('/{posts}', ShowController::class)->name('blog.show');

    Route::group(['namespace' => 'Comment', 'prefix' => '/{post}/comment'], static function () {
        Route::post('/', StoreController::class)->name('blog.comment.store');
    });

    Route::group(['namespace' => 'Likes', 'prefix' => '/{post}/likes'], static function () {
        Route::post('/', StoreController::class)->name('blog.liked.store');
    });

    Route::group(['namespace' => 'Category', 'prefix' => '/{category}/posts_by_category'], static function () {
        Route::get('/', IndexController::class)->name('blog.category.index');
    });
});


Route::group(['namespace' => 'App\Http\Controllers\Personal', 'prefix' => 'personal', 'middleware' => ['auth']],
    static function () {
        Route::get('/', IndexController::class)->name('personal.index');

        Route::group(['namespace' => 'Likes', 'prefix' => 'likes'], static function () {
            Route::get('/', IndexController::class)->name('personal.likes.index');
            Route::delete('/{posts}', DeleteController::class)->name('personal.likes.delete');
        });
        Route::group(['namespace' => 'Comments', 'prefix' => 'comments'], static function () {
            Route::get('/', IndexController::class)->name('personal.comments.index');
            Route::patch('/{comments}', UpdateController::class)->name('personal.comments.update');
            Route::get('/{comments}/edit', EditController::class)->name('personal.comments.edit');
            Route::delete('/{comments}', DeleteController::class)->name('personal.comments.delete');
        });

    });

Route::group(['namespace' => '\App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['admin', 'auth']],
    static function () {
        Route::group(['namespace' => 'Post', 'prefix' => 'post'], static function () {
            Route::get('/', IndexController::class)->name('admin.posts.index');
            Route::get('/create', CreateController::class)->name('admin.posts.create');
            Route::post('/', StoreController::class)->name('admin.posts.store');
            Route::get('/{posts}', ShowController::class)->name('admin.posts.show');
            Route::get('/{posts}/edit', EditController::class)->name('admin.posts.edit');
            Route::patch('/{posts}', UpdateController::class)->name('admin.posts.update');
            Route::delete('/{posts}', DestroyController::class)->name('admin.posts.delete');
        });


        Route::group(['namespace' => 'Category', 'prefix' => 'category'], static function () {
            Route::get('/', IndexController::class)->name('admin.category.index');
            Route::get('/create', CreateController::class)->name('admin.category.create');
            Route::post('/', StoreController::class)->name('admin.category.store');
            Route::get('/{category}', ShowController::class)->name('admin.category.show');
            Route::get('/{category}/edit', EditController::class)->name('admin.category.edit');
            Route::patch('/{category}', UpdateController::class)->name('admin.category.update');
            Route::delete('/{category}', DestroyController::class)->name('admin.category.delete');
        });

        Route::group(['namespace' => 'User', 'prefix' => 'users'], static function () {
            Route::get('/', IndexController::class)->name('admin.users.index');
            Route::get('/create', CreateController::class)->name('admin.users.create');
            Route::post('/', StoreController::class)->name('admin.users.store');
            Route::get('/{users}/edit', EditController::class)->name('admin.users.edit');
            Route::patch('/{users}', UpdateController::class)->name('admin.users.update');
            Route::delete('/{users}', DestroyController::class)->name('admin.users.delete');
        });


        Route::group(['namespace' => 'Tag', 'prefix' => 'tag'], static function () {
            Route::get('/', IndexController::class)->name('admin.tags.index');
            Route::get('/create', CreateController::class)->name('admin.tags.create');
            Route::post('/', StoreController::class)->name('admin.tags.store');
            Route::get('/{tags}', ShowController::class)->name('admin.tags.show');
            Route::get('/{tags}/edit', EditController::class)->name('admin.tags.edit');
            Route::patch('/{tags}', UpdateController::class)->name('admin.tags.update');
            Route::delete('/{tags}', DestroyController::class)->name('admin.tags.delete');
        });

        Route::get('/', IndexController::class)->name('admin.index');
    });


Auth::routes();
