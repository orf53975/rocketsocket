<?php

return [
    'version' => '0.0.1',
    'drivers' => [
        'shadowsocks' => [
            'driver' => Rocketscoket\Drivers\Shadowsocks::class,
            'repo' => Rocketscoket\Repositories\ShadowsocksRepository::class
        ]
    ]
];
