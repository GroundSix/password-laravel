<?php

return [
    /**
     * Password config.
     *
     * By default we apply some sensible default validators that follow NIST best practices
     */
    'config' => [
        new \Groundsix\Password\Validators\PasswordLengthValidator(),
        new \Groundsix\Password\Validators\PasswordDomainValidator(config('app.domain')),
        new \Groundsix\Password\Validators\PasswordBlacklistValidator(),
    ],
];
