<?php

return [

    /*
    |--------------------------------------------------------------------------
    | PWA Url
    |--------------------------------------------------------------------------
    |
    | This option controls the url/domain of the deployed app.
    |
    */
    'url' => env('PWA_URL', 'http://localhost:8081'),

    /*
    |--------------------------------------------------------------------------
    | Reset Password Url
    |--------------------------------------------------------------------------
    |
    | This option controls the url/domain existing on the deployed app which aids in
    | the next step of resetting password. The url does confirmation of request
    |
    */
    'reset_password_url' => env('PWA_RESET_PASSWORD_URL', 'http://localhost:8081/reset/password'),
];
