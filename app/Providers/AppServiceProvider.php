<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });

        Validator::replacer('without_spaces', function ($message, $attribute, $rule, $parameters) {
            $newMessage =  'The '. $attribute . ' cannot contain spaces.';
            return str_replace($message, $newMessage, $message);
        });
    }
}
