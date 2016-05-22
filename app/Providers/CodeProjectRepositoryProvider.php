<?php

namespace CodeProject\Providers;

use CodeProject\Services\UserService;
use Illuminate\Support\ServiceProvider;
use CodeProject\Repositories\RepositoryInterface;
use CodeProject\Services\ClientService;
use CodeProject\Repositories\ClientRepositoryEloquent;
use CodeProject\Services\ProjectService;
use CodeProject\Repositories\ProjectRepositoryEloquent;
use CodeProject\Services\ProjectNoteService;
use CodeProject\Services\ProjectTaskService;
use CodeProject\Repositories\ProjectNoteRepositoryEloquent;
use CodeProject\Repositories\ProjectTaskRepositoryEloquent;
use CodeProject\Repositories\UserRepositoryEloquent;

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

        $this->app->when(ProjectNoteService::class)
            ->needs(RepositoryInterface::class)
            ->give(ProjectNoteRepositoryEloquent::class);

        $this->app->when(ProjectTaskService::class)
            ->needs(RepositoryInterface::class)
            ->give(ProjectTaskRepositoryEloquent::class);

        $this->app->when(UserService::class)
            ->needs(RepositoryInterface::class)
            ->give(UserRepositoryEloquent::class);

        $this->app->when(\CodeProject\Services\ProjectFileService::class)
            ->needs(RepositoryInterface::class)
            ->give(\CodeProject\Repositories\ProjectFileRepositoryEloquent::class);
    }
}
