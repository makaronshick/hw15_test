<?php

return [
    'bitbucket' => [
        'client_id' => env('OAUTH_BITBUCKET_CLIENT_ID'),
        'secret_key' => env('OAUTH_BITBUCKET_SECRET_KEY'),
        'callback_uri' => env('OAUTH_BITBUCKET_CALLBACK_URI'),
    ]
];
