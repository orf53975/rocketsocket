<?php

use Rocketscoket\Loader;

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
    return Loader::config();
}
