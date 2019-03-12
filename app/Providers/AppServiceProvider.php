<?php

namespace App\Providers;
use Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        Validator::extend('clientes_nombre', function($attribute, $value, $parameters)
            {
                return preg_match('/[A-Za-z0-9]{5,40}/',$value);
            });
        
        Validator::extend('clientes_nif', function($attribute, $value, $parameters)
            {
                return preg_match('/^[A-Z|\d](-)?\d{7}[A-Z|\d]+$/',$value);
            });

        Validator::extend('clientes_cp', function($attribute, $value, $parameters)
            {
                return preg_match('/[0-5][1-9]{3}[0-9]$/',$value);
            });

        Validator::extend('clientes_direccion', function($attribute, $value, $parameters)
            {
                return preg_match('/[A-Za-z0-9]{5,80}/',$value);
            });

        Validator::extend('clientes_provincia', function($attribute, $value, $parameters)
            {
                return preg_match('/[A-Za-z0-9]{5,40}/',$value);
            });

        Validator::extend('clientes_localidad', function($attribute, $value, $parameters)
            {
                return preg_match('/[A-Za-z0-9]{5,40}/',$value);
            });

        Validator::extend('clientes_telefono', function($attribute, $value, $parameters)
            {
                return preg_match('/^(\+34|0034|34)?[\s|\-|\.]?[6|7|8|9][\s|\-|\.]?([0-9][\s|\-|\.]?){8}$/',$value);
            });

        Validator::extend('clientes_mail', function($attribute, $value, $parameters)
            {
                return preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/',$value);
            });

        


        Schema::defaultStringLength(191);
    }
}
