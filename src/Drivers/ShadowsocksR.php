<?php

namespace Rocketsocket\Drivers;

use Rocketsocket\Contracts\Rocketsocket as RocketsocketImpl;

class ShadowsocksR extends Rocketsocket implements RocketsocketImpl 
{
    public function create() 
    {
        return $this->repo->createAccount($this->getPassword(), $this->getBandwidth(), $this->getServiceId());
    }

    public function changePassword() 
    {
        return $this->repo->changePassword($this->getServiceId(), $this->getPassword());
    }

    public function suspend() 
    {
        return $this->repo->suspend($this->getServiceId());
    }

    public function unsuspend() 
    {
        return $this->repo->unsuspend($this->getServiceId());
    }

    public function terminate() 
    {
        return $this->repo->terminate($this->getServiceId());
    }
}
