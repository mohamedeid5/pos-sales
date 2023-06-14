<?php

namespace App\Providers;

use App\Http\Controllers\Admin\SalesMaterialTypes\SalesMaterialTypesController;
use App\Interfaces\SalesMaterialTypesInterface;
use App\Interfaces\SettingsRepositoryInterface;
use App\Interfaces\TreasuriesRepositoryInterface;
use App\Repositories\SalesMaterialTypesRepository;
use App\Repositories\SettingsRepository;
use App\Repositories\TreasuriesRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SettingsRepositoryInterface::class, SettingsRepository::class);
        $this->app->bind(TreasuriesRepositoryInterface::class, TreasuriesRepository::class);
        $this->app->bind(SalesMaterialTypesInterface::class, SalesMaterialTypesRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
