<?php

return [

    'mode' => env('PAYPAL_MODE', 'sandbox'),

    'sandbox' => [

        'client_id' => env('PAYPAL_SANDBOX_API_CLIENT_ID'),

        'client_secret' => env('PAYPAL_SANDBOX_API_CLIENT_SECRET'),

        'app_id' => 'APP-80W284485P519543T',
    ],

    'live' => [

        'client_id' => env('PAYPAL_LIVE_API_CLIENT_ID'),

        'client_secret' => env('PAYPAL_LIVE_API_CLIENT_SECRET'),

        'app_id' => env('PAYPAL_LIVE_APP_ID', ''),
    ],

    'payment_action' => 'Sale',

    'currency' => env('PAYPAL_CURRENCY', 'MXN'),

    'notify_url' => '',

    'locale' => 'es_MX',

    'validate_ssl' => true,
];