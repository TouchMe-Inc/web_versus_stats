<?php

return [
    'api' => [
        'key' => env('STEAM_API_KEY'),
        'cache' => [
            'store' => env('STEAM_API_CACHE_STORE', 'file'),
            'time' => env('STEAM_API_CACHE_TIME', 180),
        ]
    ]
];
