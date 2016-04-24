<?php

namespace CodeProject\Providers;

use Illuminate\Support\ServiceProvider;
use CodeProject\Repositories\ClientRepositoryEloquent;
use CodeProject\Repositories\RepositoryInterface;
use CodeProject\Repositories\ProjectRepositoryEloquent;
use CodeProject\Services\ClientService;
use CodeProject\Services\ProjectService;

class CodeProjectRepositoryProvider extends ServiceProvider
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
        $this->app->when(ClientService::class)
            ->needs(RepositoryInterface::class)
            ->give(ClientRepositoryEloquent::class);

        $this->app->when(ProjectService::class)
            ->needs(RepositoryInterface::class)
            ->give(ProjectRepositoryEloquent::class);


    }
}
