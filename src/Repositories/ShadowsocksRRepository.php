<?php

namespace Rocketsocket\Repositories;

use Rocketsocket\Models\ShadowsocksR;
use Rocketsocket\Exceptions\RocketException;

class ShadowsocksRRepository extends Repository 
{
    protected $fromRecycleBin = false;

    protected $recycleBinRepo;

    public function __construct() 
    {
        $this->model = new ShadowsocksR;
        $this->recycleBinRepo = new RecycleRepository;
    }

    /**
     * 获取可用端口
     * 
     * @return int
     */
    protected function getAvailablePort() 
    {
        if ($this->recycleBinRepo->getPort()) {
            $this->fromRecycleBin = true;
            return $this->recycleBinRepo->getPort()->port;
        }

        $port = $this->model->latest()->first();
        if ($port) {
            $port = $port->port + 1;
            if ($port > config('port.max')) {
                throw new RocketException('resource exhaustion');
            }

            return $port;
        }

        return config('port.min');
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
            $this->recycleBinRepo->delete($port);
        }

        return $account;
    }
}
