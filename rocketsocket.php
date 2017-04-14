<?php

use Rocketsocket\Response;
use Rocketsocket\Rocketsocket;
use Rocketsocket\Exceptions\RocketException;

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
    try {
        (new Rocketsocket($parameters))->create();

        return Response::success();
    } catch (RocketException $e) {
        throw new RocketException($e->getMessage(), $e->getCode());
    }
}

function rocketsocket_ChangePassword($parameters) 
{
    try {
        (new Rocketsocket($parameters))->changePassword();

        return Response::success();
    } catch (RocketException $e) {
        throw new RocketException($e->getMessage(), $e->getCode());
    }
}

function rocketsocket_SuspendAccount($parameters) 
{
    try {
        (new Rocketsocket($parameters))->suspend();

        return Response::success();
    } catch (RocketException $e) {
        throw new RocketException($e->getMessage(), $e->getCode());
    }
}

function rocketsocket_UnsuspendAccount($parameters) 
{
    try {
        (new Rocketsocket($parameters))->unsuspend();

        return Response::success();
    } catch (RocketException $e) {
        throw new RocketException($e->getMessage(), $e->getCode());
    }
}

function rocketsocket_TerminateAccount($parameters) 
{
    try {
        (new Rocketsocket($parameters))->terminate();

        return Response::success();
    } catch (RocketException $e) {
        throw new RocketException($e->getMessage(), $e->getCode());
    }
}
