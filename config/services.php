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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'unsplash' => [
        'applicationId' => env('UNSPLASH_APP_ID'),
        'secret' => env('UNSPLASH_SECRET_KEY'),
        'accessToken' => env('UNSPLASH_ACCESS_KEY'),
        'callbackUrl' => env('UNSPLASH_CALLBACK_URL'),
    ],

    'openweather' => [
        'api_key' => env('OPENWEATHER_API_KEY'),
    ],

    'notion' => [
        'token' => env('NOTION_API_TOKEN'),
        'shopping_db_id' => env('NOTION_SHOPPING_DB_ID'),
        'meals_db_id' => env('NOTION_MEALS_DB_ID'),
        'todos_db_id' => env('NOTION_TODOS_DB_ID'),
    ],
];
