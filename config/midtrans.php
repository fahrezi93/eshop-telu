<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Midtrans Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your Midtrans payment gateway settings.
    | Get your credentials from https://dashboard.midtrans.com
    |
    */

    'server_key' => env('MIDTRANS_SERVER_KEY'),
    'client_key' => env('MIDTRANS_CLIENT_KEY'),
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false), // Default to FALSE (Sandbox)
    
    /*
    |--------------------------------------------------------------------------
    | Snap URL Configuration
    |--------------------------------------------------------------------------
    |
    | These URLs are used for the Midtrans Snap.js integration.
    |
    */
    
    'snap_url' => env('MIDTRANS_IS_PRODUCTION', false) 
        ? 'https://app.midtrans.com/snap/snap.js' 
        : 'https://app.sandbox.midtrans.com/snap/snap.js',
];
