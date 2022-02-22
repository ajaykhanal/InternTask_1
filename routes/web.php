<?php

use App\Http\Controllers\CustomauthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[CustomauthController::class,'index'])->name('index');
Route::get('detail/{id}',[CustomauthController::class,'detail'])->name('detail');
Route::get('user/home',[CustomauthController::class,'home'])->name('user.home');
Route::get('user/register',[CustomauthController::class,'register'])->name('user.register');
Route::post('user/register',[CustomauthController::class,'register_data'])->name('register_data');
Route::get('user/login',[CustomauthController::class,'login'])->name('user.login');
Route::post('user/login',[CustomauthController::class,'login_data'])->name('login_data');
Route::get('user/logout',[CustomAuthController::class,'logout'])->name('user.logout');

Route::get('category',[CategoryController::class,'index'])->name('category');
Route::post('category',[CategoryController::class,'add'])->name('add_category');
Route::get('post',[PostController::class,'index'])->name('post');
Route::post('post',[PostController::class,'add_post'])->name('add_post');
Route::get('my_posts',[PostController::class,'my_post'])->name('my_posts');
Route::get('edit_post/{id}/',[PostController::class,'edit_post'])->name('edit_post');
Route::put('edit_post/{id}/',[PostController::class,'edit_post_data'])->name('edit_post_data');
Route::get('delete_post/{id}/',[PostController::class,'delete_post'])->name('delete_post');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
