<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/createPost', [PostController::class, 'index'])->name('createPost');
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts', [PostController::class, 'showPosts'])->name('posts');

Route::get('/post/{id}', [PostController::class, 'Post'])->name('post');
Route::get('/externalRecipe/{id}', [PostController::class, 'ExternalRecipe'])->name('externalRecipe');

Route::post('/temp', [FileController::class, 'TempUpload'])->name('temp');
Route::get('/download/{id}', [FileController::class, 'download'])->name('download');

Route::get('/categoryImage/{id}', [FileController::class, 'CategoryImage']);

Route::get('/createCategory', [CategoryController::class, 'create'])->name('createCategory');
Route::post('/createCategory', [CategoryController::class, 'store']);

Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');








