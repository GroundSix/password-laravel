# password-laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/groundsix/password-laravel.svg?style=flat-square)](https://packagist.org/packages/groundsix/password-laravel)

Bindings for groundsix/password for laravel

## Available Validation Rules

- [password_blacklist](#password_blacklist)
- [password_domain](#password_domain)
- [password_minimum_length](#password_minimum_length)
- [password_mixed_case](#password_mixed_case)
- [password_minimum_numeric](#password_minimum_numeric)
- [password_minimum_special](#password_minimum_special)

### password_blacklist

The field under validation must be not be included in the provided blacklist.

The path to the blacklist file can be set with the `password-laravel.blacklist_file` config option. If it is not set it defaults to [this list](https://github.com/danielmiessler/SecLists/blob/master/Passwords/10_million_password_list_top_10000.txt).

### password_domain

The field under validation must contain the domain specified in `password-laravel.domain`.

### password_minimum_length

The field under validation must not be shorter than the length specified in `password-laravel.minimum_length` config option.
 
If it is not set it defaults to `8` characters.

### password_mixed_case

The field under validation must be a mix of upper and lower case characters.

### password_minimum_numeric

The field under validation must contain at least the number of numeric characters specified in `password-laravel.minimum_numeric`.

If it is not set it defaults to `1` character.

### password_minimum_special

The field under validation must contain at least the number of special characters specified in `password-laravel.special.minimum`.

If it is not set it defaults to `1` character.

A default list of special characters is given in `password-laravel.special.whitelist`.
