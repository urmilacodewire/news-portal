<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\SearchController;



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

Route::get('/',[FrontController::class,'index'])->name('home');
Route::get('blogs/{name}',[FrontController::class,'blogs']);

Route::get('blog-detail/{slug}',[FrontController::class,'blogsdetail'])->name('blog-detail');
Route::get('news-detail/{id}',[FrontController::class,'newsdetail'])->name('news-detail');
Route::get('generate-pdf/{slug}', [FrontController::class, 'generatePDF'])->name('generate-pdf');
Route::get('search',[SearchController::class,'index'])->name('search');
Route::get('autosearch',[SearchController::class,'autosearch'])->name('autosearch');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
