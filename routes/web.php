<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;

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
//     return view('index');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('post', [PostsController::class, 'index'])->name('posts')->middleware('auth');
Route::get('search', [PostsController::class, 'search'])->name('search');
Route::get('details/{id}', [PostsController::class, 'details'])->name('details');
Route::get('cleam-id/{id}', [PostsController::class, 'cleam'])->name('cleam');
//google oauth 2
Route::get('redirect', [SocialController::class, 'redirect'])->name('redirect');
Route::get('callback', [SocialController::class, 'callback'])->name('callback');
