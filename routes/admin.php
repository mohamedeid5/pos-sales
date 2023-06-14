<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SalesMaterialTypes\SalesMaterialTypesController;
use App\Http\Controllers\Admin\Settings\SettingsController;
use App\Http\Controllers\Admin\Treasuries\TreasuriesController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('admin.dashboard');
});

Route::group(['prefix'=>'admin', 'as' => 'admin.', 'middleware' => 'guest'], function (){

    Route::get('login', [LoginController::class, 'loginForm'])->name('login.show');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Route::group(['prefix'=>'admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function (){

    // dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // settings
    Route::get('settings', [SettingsController::class, 'index'])->name('settings');
    Route::get('settings/edit', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::post('settings/update', [SettingsController::class, 'update'])->name('settings.update');

    // treasuries routes
    Route::resource('treasuries', TreasuriesController::class);
    Route::get('treasuries/add-treasury-delivery/{id}', [TreasuriesController::class, 'addTreasuryDelivery'])
        ->name('treasuries.add.treasury.delivery');
    Route::post('treasuries/add-treasury-delivery', [TreasuriesController::class, 'storeTreasuryDelivery'])
        ->name('treasuries.add.treasury.delivery.store');
    Route::delete('treasuries/add-treasury-delivery/{id}', [TreasuriesController::class, 'deleteTreasuryDelivery'])
        ->name('treasuries.add.treasury.delivery.delete');

    // sales material types
    Route::resource('sales-material-types', SalesMaterialTypesController::class);
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
