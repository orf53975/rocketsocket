<?php

namespace Rocketsocket\Contracts;

interface Shadowsocks
{
    /**
     * 创建账户
     *
     * @method create
     * @param  mixed $parameters
     */
    protected function create(...$parameters);

    /**
     * 更改密码
     *
     * @param  mixed $parameters
     */
    protected function changePassword(...$parameters);

    /**
     * 更改端口
     *
     * @param  mixed $parameters
     */
    protected function changePort(...$parameters);

    /**
     * 更改流量
     *
     * @param  mixed $parameters
     */
    protected function changeBandwidth(...$parameters);

    /**
     * 更改状态
     *
     * @param  mixed $parameters
     */
    protected function changeStatus(...$parameters);

    /**
     * 转移拥有者
     *
     * @param  mixed $parameters
     */
    protected function transfer(...$parameters);

    /**
     * 删除账号
     *
     * @param  mixed $parameters
     */
    protected function terminate(...$parameters);
}
