<?php

use Rocketsocket\Config;

function config($key = null, $default = null)
{
    if (is_null($key)) {
        return new Config;
    }

    return (new Config)->get($key, $default);
}
