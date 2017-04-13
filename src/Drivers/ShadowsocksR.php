<?php

namespace Rocketsocket\Drivers;

use Rocketsocket\Contracts\Rocketsocket as RocketsocketImpl;

class ShadowsocksR extends Rocketsocket implements RocketsocketImpl 
{
    public function create() 
    {
        return $this->repo->createAccount($this->getPassword(), $this->getBandwidth(), $this->getServiceId());
    }

        /**
     * 更改密码
     */
    public function changePassword() 
    {
        //
    }

    /**
     * 更改端口
     */
    public function changePort() 
    {
        //
    }

    /**
     * 更改流量
     */
    public function changeBandwidth() 
    {
        //
    }

    /**
     * 更改状态
     */
    public function changeStatus() 
    {
        //
    }

    /**
     * 转移拥有者
     */
    public function transfer() 
    {
        //
    }

    /**
     * 删除账号
     */
    public function terminate() 
    {
        //
    }
}
