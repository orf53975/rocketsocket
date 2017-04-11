<?php

namespace Rocketsocket\Contracts;

interface Rocketsocket
{
    /**
     * 创建账户
     *
     * @method create
     * @param  mixed $parameters
     */
    public function create($parameters);

    /**
     * 更改密码
     *
     * @param  mixed $parameters
     */
    public function changePassword(...$parameters);

    /**
     * 更改端口
     *
     * @param  mixed $parameters
     */
    public function changePort(...$parameters);

    /**
     * 更改流量
     *
     * @param  mixed $parameters
     */
    public function changeBandwidth(...$parameters);

    /**
     * 更改状态
     *
     * @param  mixed $parameters
     */
    public function changeStatus(...$parameters);

    /**
     * 转移拥有者
     *
     * @param  mixed $parameters
     */
    public function transfer(...$parameters);

    /**
     * 删除账号
     *
     * @param  mixed $parameters
     */
    public function terminate(...$parameters);
}
