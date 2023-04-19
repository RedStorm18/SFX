<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'firebase' => [
            'apiKey' => "AIzaSyD5so72WJI3XZczUfVatStw-OJwepYPDzI",
            'authDomain' => "sfx-signup-login.firebaseapp.com",
            'databaseURL' => "https://sfx-signup-login-default-rtdb.firebaseio.com",
            'projectId' => "sfx-signup-login",
            'storageBucket' => "sfx-signup-login.appspot.com",
            'messagingSenderId' => "622614048855",
            'appId' => "1:622614048855:web:d5071704ca718ec44bf312"

    ],
];
