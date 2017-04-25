<?php

namespace Groundsix\PasswordLaravel;

use Groundsix\Password\PasswordException;
use Groundsix\Password\PasswordValidator;
use Groundsix\Password\Validators\PasswordBlacklistValidator;
use Groundsix\Password\Validators\PasswordLengthValidator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class PasswordServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/password-laravel.php' => $this->app->configPath().'/'.'password-laravel.php',
        ], 'config');

        Validator::extend('password', function ($attribute, $value, $parameters, $validator) {
            $passwordValidator = new PasswordValidator(config('password-laravel.config'));
            try {
                return $passwordValidator->validate($value);
            } catch (PasswordException $e) {
                return false;
            }
        });
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/password-laravel.php', 'password-laravel');
    }
}
