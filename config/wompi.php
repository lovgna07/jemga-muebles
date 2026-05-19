<?php

return [
    'public_key'   => env('WOMPI_PUBLIC_KEY'),
    'private_key'  => env('WOMPI_PRIVATE_KEY'),
    'sandbox'      => env('WOMPI_SANDBOX', true),
    'redirect_url' => env('WOMPI_REDIRECT_URL'),
    'webhook_key'  => env('WOMPI_WEBHOOK_KEY'),
    'base_url'     => env('WOMPI_SANDBOX', true)
        ? 'https://sandbox.wompi.co/v1'
        : 'https://production.wompi.co/v1',
];
