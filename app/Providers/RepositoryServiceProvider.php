<?php

namespace App\Providers;

use App\Http\Controllers\Admin\SalesMaterialTypes\SalesMaterialTypesController;
use App\Interfaces\AccountsRepositoryInterface;
use App\Interfaces\AccountTypesRepositoryInterface;
use App\Interfaces\ItemCardsRepositoryInterface;
use App\Interfaces\ItemCategoriesRepositoryInterface;
use App\Interfaces\SalesMaterialTypesInterface;
use App\Interfaces\SettingsRepositoryInterface;
use App\Interfaces\StoresRepositoryInterface;
use App\Interfaces\TreasuriesRepositoryInterface;
use App\Interfaces\UomsRepositoryInterface;
use App\Repositories\AccountsRepository;
use App\Repositories\AccountTypesRepository;
use App\Repositories\ItemCardsRepository;
use App\Repositories\ItemCategoriesRepository;
use App\Repositories\SalesMaterialTypesRepository;
use App\Repositories\SettingsRepository;
use App\Repositories\StoresRepository;
use App\Repositories\TreasuriesRepository;
use App\Repositories\UomsRepository;
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
        $this->app->bind(StoresRepositoryInterface::class, StoresRepository::class);
        $this->app->bind(UomsRepositoryInterface::class, UomsRepository::class);
        $this->app->bind(ItemCategoriesRepositoryInterface::class, ItemCategoriesRepository::class);
        $this->app->bind(ItemCardsRepositoryInterface::class, ItemCardsRepository::class);
        $this->app->bind(AccountTypesRepositoryInterface::class, AccountTypesRepository::class);
        $this->app->bind(AccountsRepositoryInterface::class, AccountsRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
