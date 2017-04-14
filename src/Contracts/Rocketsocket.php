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
     * 暂停账号
     */
    public function suspend();
    
    /**
     * 恢复账号
     */
    public function unsuspend();

    /**
     * 删除账号
     */
    public function terminate();
}
