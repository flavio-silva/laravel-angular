<?php

namespace CodeProject\Providers;

use Illuminate\Support\ServiceProvider;

class UploadProvider extends ServiceProvider
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
        $this->app->bind(\CodeProject\Upload\UploadInterface::class, \CodeProject\Upload\FileUpload::class);
    }
}
