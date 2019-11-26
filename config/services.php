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
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'exchange-api' => [
        'default' => 'fixer',
        'fixer' => [
            'paid_account' => false,
            'key' => env('fixer_api_key'),
            'class' => 'Webkul\Core\Helpers\Exchange\FixerExchange'
        ]
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'billplz' => [
        'key' => env('155994cc-37ea-4c78-9460-1062df930f2c'),
        'version' => env('BILLPLZ_VERSION', 'v4'),
        'x-signature' => env('S-b4db8m12r7Te8JmS9O79Rg'),
        'sandbox' => env('BILLPLZ_SANDBOX', true),
    ]
];
