<?php

namespace Rocketsocket\Contracts;

interface Rocketsocket
{
    /**
     * 创建账户
     */
    public function create();

    /**
     * 更改密码
     */
    public function changePassword();

    /**
     * 更改端口
     */
    public function changePort();

    /**
     * 更改流量
     */
    public function changeBandwidth();

    /**
     * 更改状态
     */
    public function changeStatus();

    /**
     * 转移拥有者
     */
    public function transfer();

    /**
     * 删除账号
     */
    public function terminate();
}
