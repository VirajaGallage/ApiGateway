<?php
return [
    'customer' => [
        'base_uri' => env('CUSTOMER_SERVICE_BASE_URI'),
        'secret' => env('CUSTOMER_SERVICE_SECRET')
    ],
    'staff' => [
        'base_uri' => env('STAFF_SERVICE_BASE_URI'),
        'secret' => env('STAFF_SERVICE_SECRET'),
    ]
];