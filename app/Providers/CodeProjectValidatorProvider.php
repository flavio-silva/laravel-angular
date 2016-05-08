<?php

namespace CodeProject\Providers;

use Illuminate\Support\ServiceProvider;
use CodeProject\Validators\ValidatorInterface;
use CodeProject\Validators\ClientValidator;
use CodeProject\Validators\ProjectValidator;
use CodeProject\Services\ClientService;
use CodeProject\Services\ProjectService;
use CodeProject\Services\ProjectNoteService;
use CodeProject\Services\ProjectTaskService;
use CodeProject\Validators\ProjectNoteValidator;
use CodeProject\Validators\ProjectTaskValidator;

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

        $this->app->when(ProjectNoteService::class)
            ->needs(ValidatorInterface::class)
            ->give(ProjectNoteValidator::class);

        $this->app->when(ProjectTaskService::class)
            ->needs(ValidatorInterface::class)
            ->give(ProjectTaskValidator::class);
    }
}
