<?php

namespace Rocketscoket\Drivers;

use Rocketsocket\Contracts\Rocketsocket as RocketsocketImpl;

class Shadowsocks extends Rocketsocket implements RocketsocketImpl 
{
    protected function create() 
    {
        dd($this->repo);
    }
}
