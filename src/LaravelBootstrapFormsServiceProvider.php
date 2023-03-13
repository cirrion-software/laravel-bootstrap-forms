<?php

namespace Cirrion\LaravelBootstrapForms;

use Cirrion\LaravelBootstrapForms\FormService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class LaravelBootstrapFormsServiceProvider extends ServiceProvider implements DeferrableProvider
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
