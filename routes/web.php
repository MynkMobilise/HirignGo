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

Route::middleware(['auth', 'api'])->group(function () {
Route::get('/dashboard', [HomeController::class, 'index'])->name('home.dashboard');
Route::get('user/dashboard', [HomeController::class, 'userDashboard'])->name('home.userDashboard');
Route::get('/users', [HomeController::class, 'user'])->name('users');
Route::get('/liveCamp', [HomeController::class, 'liveCamp'])->name('users');
});

// Route::middleware(['auth', 'api'])->prefix('setting')->group(function () {
//     Route::get('header', [HomeController::class, 'header'])->name('setting.header');
//     Route::get('footer', [HomeController::class, 'footer'])->name('setting.footer');
//     Route::get('appearance', [HomeController::class, 'appearance'])->name('setting.appearance');
//     Route::get('pages', [HomeController::class, 'pages'])->name('setting.pages');
// });

Route::middleware(['auth', 'api'])->prefix('jobs')->group(function () {
    Route::get('jobs-list', [JobController::class, 'index'])->name('jobs.jobs-list');
    Route::get('post-job', [JobController::class, 'create'])->name('jobs.post-job');
    Route::get('edit-job/{id}', [JobController::class, 'edit'])->name('jobs.edit-job');
    Route::post('add-job', [JobController::class, 'store'])->name('jobs.add-job');
    Route::get('delete-job/{id}', [JobController::class, 'delete'])->name('jobs.delete-job');
    Route::get('apply/{id}', [JobController::class, 'apply'])->name('jobs.apply');
});

Route::middleware(['auth', 'api'])->prefix('user')->group(function () {
    Route::get('candidates', [UserController::class, 'index'])->name('user.candidates');
    Route::get('brands', [UserController::class, 'getBrand'])->name('user.brands');
    Route::get('myprofile', [UserController::class, 'myProfile'])->name('user.myprofile');
    Route::get('brandProfile', [UserController::class, 'brandProfile'])->name('user.brandProfile');
    Route::get('candidates-applied', [UserController::class, 'appliedCandList'])->name('user.candidates-applied');
    Route::get('shortlisted-candidates', [UserController::class, 'shortlistedCandList'])->name('user.shortlisted-candidates');
    Route::post('update-brand-profile', [UserController::class, 'updateBrandProfile'])->name('user.updateBrandProfile');
});

//Users Routes

Route::middleware(['auth', 'api'])->prefix('campaigns')->group(function () {
    Route::get('my-applied', [UserController::class, 'myApplied'])->name('user.myApplied');
});
