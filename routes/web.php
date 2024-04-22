<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;


use App\Jobs\SendWelcomeEmail;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['middleware' => ['role:User|Admin', 'auth']], function () {

    // User Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile-picture', [ProfileController::class, 'updatePicture'])->name('profile.picture');

    // Article Post Module Resource Route
    Route::resource('articles', ArticleController::class);

});

// Admin Routes Middleware
Route::group(['middleware' => ['role:Admin', 'auth']], function () {

    // Users Module Routes
    Route::resource('users', UserController::class);

    // Admin Premissions Routes
    Route::resource('admin', AdminController::class);
});


// Custom Middleware for Admin Role Actions Only
Route::group(['middleware' => ['admin', 'auth']], function () {

    Route::resource('admin_only', AdminController::class);
});


Route::get('/mail', function () {
    // test purpose
    $user   =   Auth::user();
    SendWelcomeEmail::dispatch($user);
});

require __DIR__.'/auth.php';