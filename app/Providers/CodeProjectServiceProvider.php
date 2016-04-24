<?php

namespace CodeProject\Providers;

use CodeProject\Http\Controllers\ClientController;
use CodeProject\Http\Controllers\ProjectController;
use Illuminate\Support\ServiceProvider;
use CodeProject\Services\ServiceInterface;
use CodeProject\Services\ClientService;
use CodeProject\Services\ProjectService;

class CodeProjectServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind(ServiceInterface::class, ClientService::class);
        $this->app->when(ClientController::class)
            ->needs(ServiceInterface::class)
            ->give(ClientService::class);

        $this->app->when(ProjectController::class)
            ->needs(ServiceInterface::class)
            ->give(ProjectService::class);
    }
}
