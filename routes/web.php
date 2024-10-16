<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
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
    Route::get('user/search/autocomplete', [UserController::class, 'autocomplete'])->name('user.autocomplete');
    /**
     * Blog Routes
     */
    Route::resource('blog', BlogController::class);
    Route::get('blog/switch/status', [BlogController::class, 'switchStatus'])->name('blog.switchStatus');
    Route::get('blog/trash/view', [BlogController::class, 'trash'])->name('blog.trash');
    Route::post('blog/{slug}/restore', [BlogController::class, 'restore'])->name('blog.restore');
    Route::delete('blog/{slug}/force/delete', [BlogController::class, 'forceDelete'])->name('blog.forceDelete');
    /**
     * Category Routes
     */
    Route::resource('category', CategoryController::class);
    Route::get('category/trash/view', [CategoryController::class, 'trash'])->name('category.trash');
    Route::post('category/{slug}/restore', [CategoryController::class, 'restore'])->name('category.restore');
    Route::delete('category/{slug}/force/delete', [CategoryController::class, 'forceDelete'])->name('category.forceDelete');
    Route::get('category/switch/status', [CategoryController::class, 'switchStatus'])->name('category.switchStatus');
    /**
     * Settings Routes 
     * Roles & Permissions Routes
     */
    Route::resource('role', RoleController::class);
    Route::get('/settings/roles_permissions', [RoleController::class, 'rolesPermissions'])->name('rolePermissions');
});
