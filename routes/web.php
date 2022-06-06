<?php

use App\Http\Controllers\Site\HomeController;
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

Route::group(['as' => 'site.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/achievement', [HomeController::class, 'achievement'])->name('achievement');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/administration', [HomeController::class, 'administration'])->name('administration');
    Route::get('/ideas', [HomeController::class, 'ideas'])->name('ideas');
    Route::get('/policies', [HomeController::class, 'policies'])->name('policies');
    Route::get('/rating', [HomeController::class, 'rating'])->name('rating');
    Route::get('/media-section', [HomeController::class, 'mediaSection'])->name('mediaSection');
    Route::post('/post-idea', [HomeController::class, 'PostIdea'])->name('PostIdea');
    Route::post('/post-rate', [HomeController::class, 'PostRate'])->name('PostRate');
    Route::get('/roles', [HomeController::class, 'roles'])->name('roles');
    Route::get('/donate', [HomeController::class, 'donate'])->name('donate');
});
//require __DIR__.'/auth.php';
