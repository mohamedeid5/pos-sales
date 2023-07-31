<?php

use App\Http\Controllers\Admin\AccountTypes\AccountTypesController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ItemCards\ItemCardsController;
use App\Http\Controllers\Admin\ItemCategories\ItemCategoriesController;
use App\Http\Controllers\Admin\SalesMaterialTypes\SalesMaterialTypesController;
use App\Http\Controllers\Admin\Settings\SettingsController;
use App\Http\Controllers\Admin\Stores\StoresController;
use App\Http\Controllers\Admin\Treasuries\TreasuriesController;
use App\Http\Controllers\Admin\Uoms\UomsController;
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

    // stores routes
    Route::resource('stores', StoresController::class);

    // uoms routes
    Route::resource('uoms', UomsController::class);

    // item-categories routes
    Route::resource('item-categories', ItemCategoriesController::class);

    // item-categories routes
    Route::resource('item-cards', ItemCardsController::class);

    // account types routes
    Route::resource('account-types', AccountTypesController::class);
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
