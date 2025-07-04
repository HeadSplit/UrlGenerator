<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClickController;

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

Route::group([], function () {
    Route::get('/', function () {
        return view('pages.index');
    })->name('home');

    Route::get('/register', function () {
        return view('pages.auth.register');
    })->name('register');

    Route::get('/login', function () {
        return view('pages.auth.login');
    })->name('login');

    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');

    Route::get('/dashboard', function () {
        return view('pages.index');
    })->name('dashboard')->middleware('auth');

    Route::get('/lk', [LinkController::class, 'getLinks'])->name('lk')->middleware('auth');

    Route::get('/statistic/{link:short_link}', [LinkController::class, 'getStatistic'])->name('links.stats')
        ->middleware('auth');

    Route::get('/{short_link}', [ClickController::class, 'clickOnLink'])->name('short.link');
});

Route::group([],function () {
   Route::post('/register/create', RegisterController::class)->name('register.post');
   Route::post('/login', AuthController::class)->name('login.post');
   Route::post('/links/create', [LinkController::class, 'createLink'])->name('links.store');
   Route::delete('delete/{link}', [LinkController::class, 'deleteLink'])->name('links.destroy');
});

