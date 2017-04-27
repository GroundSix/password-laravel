<?php

namespace Groundsix\PasswordLaravel;

use Groundsix\Password\PasswordException;
use Groundsix\Password\PasswordValidator;
use Groundsix\Password\Validators\PasswordBlacklistValidator;
use Groundsix\Password\Validators\PasswordDomainValidator;
use Groundsix\Password\Validators\PasswordLengthValidator;
use Groundsix\Password\Validators\PasswordMinimumNumberValidator;
use Groundsix\Password\Validators\PasswordMixedCaseValidator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class PasswordServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/password-laravel.php' => $this->app->configPath().'/'.'password-laravel.php',
        ], 'config');

        Validator::extend('password_blacklist', function ($attribute, $value) {
            $passwordValidator = new PasswordBlacklistValidator(config('password-laravel.blacklist_file'));
            try {
                return $passwordValidator->validate($value);
            } catch (PasswordException $e) {
                return false;
            }
        });

        Validator::extend('password_domain', function ($attribute, $value) {
            $passwordValidator = new PasswordDomainValidator(config('password-laravel.domain'));
            try {
                return $passwordValidator->validate($value);
            } catch (PasswordException $e) {
                return false;
            }
        });

        Validator::extend('password_minimum_length', function ($attribute, $value) {
            $passwordValidator = new PasswordLengthValidator(config('password-laravel.minimum_length'));
            try {
                return $passwordValidator->validate($value);
            } catch (PasswordException $e) {
                return false;
            }
        });

        Validator::extend('password_mixed_case', function ($attribute, $value) {
            $passwordValidator = new PasswordMixedCaseValidator();
            try {
                return $passwordValidator->validate($value);
            } catch (PasswordException $e) {
                return false;
            }
        });

        Validator::extend('password_minimum_numeric', function ($attribute, $value) {
            $passwordValidator = new PasswordMinimumNumberValidator(config('password-laravel.minimum_numeric'));
            try {
                return $passwordValidator->validate($value);
            } catch (PasswordException $e) {
                return false;
            }
        });

        Validator::extend('password_minimum_special', function ($attribute, $value) {
            $passwordValidator = new PasswordMinimumNumberValidator(
                config('password-laravel.special.minimum'),
                config('password-laravel.special.whitelist')
            );
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
