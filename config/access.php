<?php

return [

    /*
     * Application captcha specific settings
     */
    'captcha' => [
        /*
         * Whether the registration captcha is on or off
         */
        'registration' => env('REGISTRATION_CAPTCHA_STATUS', false),
    ],

    /*
     * Whether or not registration is enabled
     */
    'registration' => env('ENABLE_REGISTRATION', true),

    /*
     * Table names for access tables
     */
    'table_names' => [
        'password_histories' => 'password_histories',
        'users' => 'users',
    ],

    /*
     * Configurations for the user
     */
    'users' => [
        /*
         * Whether or not the user has to confirm their email when signing up
         */
        'confirm_email' => env('CONFIRM_EMAIL', false),

        /*
         * Whether or not the user has to confirm their sms when signing up
         */
        'confirm_sms' => env('CONFIRM_SMS', false),

        /*
         * Whether or not the users email can be changed on the edit profile screen
         */
        'change_email' => env('CHANGE_EMAIL', false),

        /*
         * The name of the super administrator role
         */
        'admin_role' => 'Administrator',

        /*
         * The default role all new registered users get added to
         */
        'default_role' => 'user',

        'vendor_role' => 'vendor',

        /*
         * Whether or not new users need to be approved by an administrator before logging in
         * If this is set to true, then confirm_email is not in effect
         */
        'requires_approval' => env('REQUIRES_APPROVAL', false),

        /*
         * Login username to be used by the controller.
         */
        'username' => 'email',

    ],

    /*
    * Configuration for roles
    */
    'roles' => [
        /*
         * Whether a role must contain a permission or can be used standalone as a label
         */
        'role_must_contain_permission' => true,
    ],

    /*
     * Socialite session variable name
     * Contains the name of the currently logged in provider in the users session
     * Makes it so social logins can not change passwords, etc.
     */
    'socialite_session_name' => 'socialite_provider',
];
