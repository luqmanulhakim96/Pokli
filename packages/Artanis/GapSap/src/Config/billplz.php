<?php
return [
    'api_key' => env('BILLPLZ_API_KEY'),
    'version' => env('BILLPLZ_VERSION', 'v3'),
    'x-signature' => env('BILLPLZ_X_SIGNATURE'),
    'sandbox' => env('BILLPLZ_SANDBOX', true),
    ]
];
