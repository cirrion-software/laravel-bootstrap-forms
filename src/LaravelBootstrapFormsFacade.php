<?php

namespace Cirrion\LaravelBootstrapForms;

use \Illuminate\Support\Facades\Facade;

class LaravelBootstrapFormsFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'bootstrap-form';
    }
}
