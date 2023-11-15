<?php

use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\SendEmailController;

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
Route::controller(LoginRegisterController::class)->group(function() {
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/show', 'indexUser')->name('user-get');
        Route::post('/logout', 'logout')->name('logout');
        Route::get('/user', 'indexUser')->name('auth.index');
        Route::get('/user/edit/{userid}', 'edit')->name('auth.edit');
        Route::put('/user/{userid}', 'update')->name('auth.update');
        Route::delete('/user/delete/{userid}', 'destroy')->name('auth.destroy');
        // ini rute resize
        Route::get('/user/resize/{userid}', 'resize')->name('auth.resize');
        Route::put('/user/resize/{userid}', 'resizePost')->name('auth.resizePost');
    });
    Route::get('/register', 'register')->name('register');
        Route::post('/store', 'store')->name('store');
        Route::get('/login', 'login')->name('login');
        Route::post('/authenticate', 'authenticate')->name('authenticate');
});
Route::get('/send-email',[SendEmailController::class,'index']) ->name('kirim-email');
Route::post('/post-email',[SendEmailController::class,'store']) ->name('post-email');
Route::resource('gallery', GalleryController::class);
