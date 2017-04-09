<?php

namespace Rocketsocket\Contracts;

interface Database
{
    protected $database;

    /**
     * 设置数据库链接参数
     *
     * @param mixed $parameter 数据库链接参数
     */
    protected function setDatabase(...$parameters);

    /**
     * 获取数据库链接参数
     *
     * @param mixed $parameter 数据库链接参数
     */
    protected function getDatabase();
}
