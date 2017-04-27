<?php

return [
    /**
     * The password blacklist file path.
     * If left null, the default provided one will be used. This is the SecLists Top 10000 passwords list
     * (https://github.com/danielmiessler/SecLists/blob/master/Passwords/10_million_password_list_top_10000.txt)
     *
     * Default: null
     */
    'blacklist_file' => null,

    /**
     * The domain of the application.
     * Used to filter out uses of the domain as the password.
     *
     * Default: ''
     */
    'domain' => '',

    /**
     * Minimum password length.
     * Bigger is better. A minimum value of 8 is suggested by the NIST.
     *
     * Default: 8
     */
    'minimum_length' => 8,

    /**
     * Minimum number of numeric characters in the password.
     * Not usually necessary if a decent blacklist is used alongside a reasonable minimum length.
     *
     * Default: 1
     */
    'minimum_numeric' => 1,

    /**
     * Special character rules
     * Not usually necessary if a decent blacklist is used alongside a minimum length.
     */
    'special' => [

        /**
         * Minimum number of special characters to require
         *
         * Default: 1
         */
        'minimum' => 1,

        /**
         * Whitelist of what is considered a special character.
         * The default provided uses the OWASP list of special characters.
         * (https://www.owasp.org/index.php/Password_special_characters)
         *
         * Default: [...]
         */
        'whitelist' => [
            ' ', '!', '"', '#', '$', '%', '&', '\'', '(', ')', '*', '+', ',', '-', '.', '/', ':', ';', '<',
            '=', '>', '?', '@', '[', '\\', ']', '^', '_', '`', '{', '|', '}', '~',
        ],
    ]
];
