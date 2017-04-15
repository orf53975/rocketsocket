<?php

namespace Rocketsocket\Drivers;

use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Rocketsocket\Repositories\Repository;
use Illuminate\Database\Capsule\Manager as Capsule;

class Rocketsocket 
{
    const CONNECTION_NAME = 'rocketsocket';

    protected $repo;

    protected $parameters;

    public function __construct(array $parameters, Repository $repo) 
    {
        $this->parameters = $parameters;
        $this->repo = $repo;
        
        $this->addDatabaseConnection();
    }

    /**
     * 获取服务器信息
     * 
     * @return array
     */
    protected function getServer() 
    {
        return [
            'host' => $this->parameters['serverip'],
            'username' => $this->parameters['serverusername'],
            'password' => $this->parameters['serverpassword'],
            'database' => $this->parameters['configoption2']
        ];
    }

    /**
     * 添加数据库连接
     */
    protected function addDatabaseConnection() 
    {
        $capsule = new Capsule;

        $defaultDatabaseConfig = [
                'driver' => 'mysql',
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => ''
            ];

        $capsule->addConnection(array_merge($defaultDatabaseConfig, $this->getServer()), self::CONNECTION_NAME);

        // 为什么会有这个呢？
        // 因为我用 Model 在这里注册连接的时候会覆盖掉 WHMCS 的 Database Connection 
        // 然后会导致 WHMCS 出错。所以咯，再给他注册一个连接
        $capsule->addConnection(array_merge($defaultDatabaseConfig, system_db_config()), 'default');

        $capsule->setEventDispatcher(new Dispatcher(new Container));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    protected function getBandwidth() 
    {
        return bandwidth_convert($this->parameters['configoption3'], 'MB', 'bytes');
    }

    protected function getServiceId() 
    {
        return $this->parameters['serviceid'];
    }

    protected function getPassword() 
    {
        return $this->parameters['customfileds']['password'] ?: $this->parameters['password'];
    }
}
