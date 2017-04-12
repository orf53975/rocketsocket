<?php

namespace Rocketsocket\Repositories;

use Rocketsocket\Models\Shadowsocks;

class ShadowsocksRepository extends Repository 
{
    public function __construct() 
    {
        $this->model = new Shadowsocks;
    }
}
