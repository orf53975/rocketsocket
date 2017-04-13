<?php

return [
    'version' => '0.0.1',
    'port' => [
        'min' => 10000,
        'max' => 65535
    ],
    'drivers' => [
        'shadowsocks' => [
            'driver' => Rocketsocket\Drivers\ShadowsocksR::class,
            'repo' => Rocketsocket\Repositories\ShadowsocksRRepository::class
        ]
    ]
];
