<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Admin\Epaper\EpaperController;
use App\Http\Controllers\Admin\Videos\VideoController;
use App\Http\Controllers\Admin\Banners\BannerController;
use App\Http\Controllers\Admin\Keywords\KeywordController;


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

Route::get('/', [AuthController::class, 'getLogin'])->name('adminLogin');
//Route::get('/login', [AuthController::class, 'getLogin']);
Route::post('/login', [AuthController::class, 'postLogin'])->name('admin.login');

Route::group(['middleware' => 'auth:admin'],function () {
    Route::post('/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dasboard');

    /* Category */
    Route::resource('/category',CategoryController::class);
    Route::post('category/status',[CategoryController::class,'status'])->name('category.status');
    Route::post('category/reorder',[CategoryController::class,'sortable'])->name('category.sortable');
          
    /*Posts*/    
    Route::resource('/posts',PostController::class);
    Route::post('uploads', [PostController::class, 'uploadImage'])->name('posts.upload');
    Route::post('posts/status',[PostController::class,'status'])->name('posts.status');
    Route::post('posts/popular',[PostController::class,'popular'])->name('posts.popular');
    Route::post('post-sortable',[PostController::class,'sortable'])->name('posts.sortable');

    /*Epaper*/    
    Route::resource('/e-paper',EpaperController::class);
    Route::post('e-paper/status',[EpaperController::class,'status'])->name('e-paper.status');
    Route::post('e-paper/popular',[EpaperController::class,'popular'])->name('e-paper.popular');
     Route::post('e-paper-sortable',[EpaperController::class,'sortable'])->name('e-paper.sortable');


    /*Videos*/ 
    Route::resource('/video',VideoController::class);
    Route::post('video/status',[VideoController::class,'status'])->name('video.status');
    Route::post('video/popular',[VideoController::class,'popular'])->name('video.popular');
     Route::post('video-sortable',[VideoController::class,'sortable'])->name('video.sortable');


    /*Banners*/ 
    Route::resource('/banner',BannerController::class);

    /*Keywords*/ 
    Route::resource('keywords',KeywordController::class);
    Route::post('keywords/status',[KeywordsController::class,'status'])->name('keywords.status');
    
});
