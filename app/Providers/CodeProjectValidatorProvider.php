<?php

namespace CodeProject\Providers;

use Illuminate\Support\ServiceProvider;
use CodeProject\Validators\ValidatorInterface;
use CodeProject\Validators\ClientValidator;
use CodeProject\Validators\ProjectValidator;
use CodeProject\Services\ClientService;
use CodeProject\Services\ProjectService;

class CodeProjectValidatorProvider extends ServiceProvider
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
            ->needs(ValidatorInterface::class)
            ->give(ClientValidator::class);

        $this->app->when(ProjectService::class)
            ->needs(ValidatorInterface::class)
            ->give(ProjectValidator::class);
    }
}
