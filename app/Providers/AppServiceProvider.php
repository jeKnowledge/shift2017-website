<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use App\Application;
use App\Observers\ApplicationObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('hashtags', function ($attribute, $value, $parameters, $validator) {
            $skills = explode(' ', $value);
            foreach ($skills as $skill) {
                if($skill != "" && $skill[0] != '#')
                    return false;
            }
            return true;
        });

        Validator::extend('at_least', function ($attribute, $value, $parameters, $validator) {
            $skills = explode(' ', $value);
            if(count($skills)>=$parameters[0])
                return true;
            else
                return false;

        });

        Validator::replacer('at_least', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':value', $parameters[0], $message);
        });


        Application::observe(ApplicationObserver::class);
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
