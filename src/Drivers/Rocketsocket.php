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

        $capsule->addConnection(array_merge([
                'driver' => 'mysql',
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => ''
            ], $this->getServer()), self::CONNECTION_NAME);

        $capsule->setEventDispatcher(new Dispatcher(new Container));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    protected function getBandwidth() 
    {
        return bandwidth_convert($this->parameters['configoption3'], 'MB', 'bytes');
    }
}
