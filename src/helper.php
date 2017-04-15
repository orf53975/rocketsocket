<?php

use Rocketsocket\Config;

function config($key = null, $default = null)
{
    if (is_null($key)) {
        return new Config;
    }

    return (new Config)->get($key, $default);
}

function system_db_config() 
{
    require dirname(__FILE__) . '/../../../../configuration.php';

    return [
        'host' => $db_host,
        'username' => $db_username,
        'password' => $db_password,
        'database' => $db_name
    ];
}

function bandwidth_convert($number, $before, $after) 
{
    return $number;
}

function rdd() 
{
    echo '<pre>';
    var_dump(func_get_args());
    echo '<pre/>';
    die;
}
