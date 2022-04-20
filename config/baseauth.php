<?php

return [
    'users' => collect(
        [
            ['username' => env('BASICAUTH_USERNAME'), 'password' => env('BASICAUTH_PASSWORD')],
        ]
    ),
];
