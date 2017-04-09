<?php

!defined('WHMCS') && die('This file cannot be accessed directly');

use Rocketsocket\ModuleSetting;

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
    return array_merge(ModuleSetting::config(), ModuleSetting::packages());
}
