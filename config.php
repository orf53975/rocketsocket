<?php

return [
    'version' => '0.0.1',
    'drivers' => [
        'shadowsocks' => [
            'driver' => Rocketsocket\Drivers\Shadowsocks::class,
            'repo' => Rocketsocket\Repositories\ShadowsocksRepository::class
        ]
    ]
];
