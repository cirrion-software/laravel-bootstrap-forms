<?php

namespace Cirrion\LaravelBootstrapForms;

use Illuminate\Support\ServiceProvider;

class LaravelBootstrapFormsServiceProvider extends ServiceProvider
{

    protected $defer = true;

    public function register()
    {
        $this->app->singleton('bootstrap-form', function () {
            return new FormService();
        });
    }

    public function provides()
    {
        return ['bootstrap-form'];
    }
}
