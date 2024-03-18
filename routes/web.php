<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'login']);
// Route::get('admin/login', function () {
//     return view('admin.auth.login')->name('admin.login');
// });

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('home.dashboard');
Route::get('/users', [HomeController::class, 'user'])->name('users');

Route::prefix('setting')->group(function () {
    Route::get('header', [HomeController::class, 'header'])->name('setting.header');
    Route::get('footer', [HomeController::class, 'footer'])->name('setting.footer');
    Route::get('appearance', [HomeController::class, 'appearance'])->name('setting.appearance');
    Route::get('pages', [HomeController::class, 'pages'])->name('setting.pages');
});

Route::prefix('jobs')->group(function () {
    Route::get('jobs-list', [JobController::class, 'index'])->name('jobs.jobs-list');
    Route::get('post-job', [JobController::class, 'create'])->name('jobs.post-job');
});

Route::prefix('user')->group(function () {
    Route::get('candidates', [UserController::class, 'index'])->name('user.candidates');
    Route::get('candidates-applied', [UserController::class, 'create'])->name('user.candidates-applied');
});
