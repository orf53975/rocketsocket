<?php

return [
    'version' => '0.0.1',
    'min_port' => 10000,
    'max_port' => 65535,
    'drivers' => [
        'shadowsocks' => [
            'driver' => Rocketsocket\Drivers\ShadowsocksR::class,
            'repo' => Rocketsocket\Repositories\ShadowsocksRRepository::class
        ]
    ]
];
