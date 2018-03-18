<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use Hash;
use Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Validator::extend('check_old_password',function($attribute, $value, $parameters){

             return Hash::check($value, Auth::user()->password);
            // return  str_replace(':field', $parameters[0], "Your email or password was wrong!");

        });
        Validator::replacer('check_old_password', function($attribute, $value, $parameters) {
          return str_replace(':field', $parameters[0], "Your old password was wrong!");
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
