<?php

return [
    'default' => 'mailjet',

    'mailers' => [
        'mailjet' => [
            'transport' => 'mailjet',
        ],
    ],

    'transports' => [
        'mailjet' => [
            'transport' => 'api',
            'api_key' => env('MAILJET_APIKEY'),
            'secret_key' => env('MAILJET_SECRET'),
        ],
    ],
];