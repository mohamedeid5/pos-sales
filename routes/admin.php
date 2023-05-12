<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('admin.dashboard');
});

Route::group(['prefix'=>'admin', 'as' => 'admin.', 'middleware' => 'guest'], function (){

    Route::get('login', [LoginController::class, 'loginForm'])->name('login.show');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Route::group(['prefix'=>'admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function (){

    Route::get('dashboard', [DashboardController::class, 'index']);

});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
