<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Admin Panel Route list 
 * Middleware & Route Group
 */
Route::middleware(['auth'])->group(function () {
    /**
     * User Routes
     */
    Route::resource('user', UserController::class);
    /**
     * Blog Routes
     */
    Route::resource('blog', BlogController::class);
    /**
     * Category Routes
     */
    Route::resource('category', CategoryController::class);
});
