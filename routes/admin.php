<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Settings\SettingsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('admin.dashboard');
});

Route::group(['prefix'=>'admin', 'as' => 'admin.', 'middleware' => 'guest'], function (){

    Route::get('login', [LoginController::class, 'loginForm'])->name('login.show');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Route::group(['prefix'=>'admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function (){

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('settings', [SettingsController::class, 'index'])->name('settings');
    Route::get('settings/edit', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::post('settings/update', [SettingsController::class, 'update'])->name('settings.update');

});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
