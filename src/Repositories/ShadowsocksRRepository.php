<?php

namespace Rocketsocket\Repositories;

use Rocketsocket\Models\ShadowsocksR;
use Rocketsocket\Exceptions\RocketException;

class ShadowsocksRRepository extends Repository 
{
    protected $fromRecycleBin = false;

    protected $recycleBin;

    public function __construct() 
    {
        $this->model = new ShadowsocksR;
        $this->recycleBin = new RecycleRepository;
    }

    /**
     * 获取可用端口
     * 
     * @return int
     */
    protected function getAvailablePort() 
    {
        if ($this->recycleBin->getPort()) {
            $this->fromRecycleBin = true;
            return $this->recycleBin->getPort()->port;
        }

        $port = $this->model->latest()->first();
        if ($port) {
            $port = $port->port + 1;
            if ($port > config('max_port')) {
                throw new RocketException('resource exhaustion');
            }

            return $port;
        }

        return config('min_port');
    }

    /**
     * 创建一个 Shadowsocks
     * 
     * @param  string $password  密码
     * @param  int $bandwidth 流量
     * @param  int $serviceId WHMCS Service Id
     * 
     * @return Model
     */
    public function createAccount($password, $bandwidth, $serviceId) 
    {
        $port = $this->getAvailablePort();

        $account = $this->create([
                'passwd' => $password,
                'port' => $port,
                'transfer_enable' => $bandwidth,
                'service_id' => $serviceId
            ]);
        if ($account) {
            $this->recycleBin->delete($port);
        }

        return $account;
    }
}
