<?php

!defined('WHMCS') && die('This file cannot be accessed directly');

require __DIR__ . '/vendor/autoload.php';

function rocketsocket_MetaData()
{
    return [
        'DisplayName' => 'Shadowsocks',
        'RequiresServer' => true
    ];
}

function rocketsocket_ConfigOptions()
{
    $options = [];
    $drivers = config('drivers');
    foreach ($drivers as $driver => $class) {
        $options[$driver] = $driver;
    }

    return [
        'Shadowsocks' => [
            'Type' => 'dropdown',
            'Options' => $options
        ],
        'Database' => [
            'Type' => 'text',
            'Size' => '25'
        ],
        'Bandwidth' => [
            'Type' => 'text',
            'Size' => '25'
        ],
        // should be override, configurable, In Database or File ?
        'Servers' => [
            'Type' => 'textarea',
            'Rows' => 5,
            'Cols' => 35
        ]
    ];
}

function rocketsocket_CreateAccount(array $parameters)
{
    //
}
