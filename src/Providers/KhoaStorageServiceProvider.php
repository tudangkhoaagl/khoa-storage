<?php

namespace Khoa\KhoaStorage\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Khoa\KhoaStorage\StorageFacade\StorageFacade;
use Khoa\KhoaStorage\Supports\Storage as KhoaStorage;

class KhoaStorageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('storage_package', function ($app) {
            return new KhoaStorage();
        });

        require_once __DIR__ . '/../Helper/helper.php';

        // Register alias for packge
        $loader = AliasLoader::getInstance();
        $loader->alias('StoragePackage', StorageFacade::class);

        $this->registerRoute();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {

    }

    /**
     * Register route for plugin
     *
     * @return void
     */
    public function registerRoute(): void
    {
        if (class_exists(RouteServiceProvider::class)) {
            $this->app->register(RouteServiceProvider::class);
        }
    }
}
