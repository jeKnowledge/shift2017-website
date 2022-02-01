<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'github' => [
        'client_id' => '0d7be4fc000748276b75',
        'client_secret' => '614cc76534427300722316af37ef2d0cdde9b3d0',
        'redirect' => 'http://shiftappens.com/auth/github/callback',
    ],
    'facebook' => [
        'client_id' => '883954218402547',
        'client_secret' => 'f5c3351dd4076c660a79e5e172fcfd6f',
        'redirect' => 'http://shiftappens.com/auth/facebook/callback',
    ],
    'google' => [
        'client_id' => '342166009562-dkquap3huv2fa5nkh588c7v3lrma8vu9.apps.googleusercontent.com',
        'client_secret' => 'gTQMfXkV7bFtZyEEuSpfrlQa',
        'redirect' => 'http://shiftappens.com/auth/google/callback',
    ],
];
