<?php

namespace Rocketsocket\Repositories;

use Rocketsocket\Models\ShadowsocksR;
use Rocketsocket\Exceptions\RocketException;
use Rocketsocket\Repositories\RecycleBinRepository;

class ShadowsocksRRepository extends Repository
{
    protected $fromRecycleBin = false;

    protected $recycleBinRepo;

    public function __construct()
    {
        $this->model = new ShadowsocksR;
        $this->recycleBinRepo = new RecycleBinRepository;
    }

    /**
     * 根据 Service Id 获取账号
     * 
     * @param  int $serviceId Service id
     *
     * @return Model
     */
    public function getAccountByServiceId($serviceId) 
    {
        return $this->model->ofServiceId($serviceId)->first();
    }

    /**
     * 根据 Service Id 更改账号
     * 
     * @param  int $serviceId Service id
     *
     * @throws RocketException
     * 
     * @return bool
     */
    public function updateByServiceId($serviceId, $update) 
    {
        if (!$this->getAccountByServiceId($serviceId)) {
            throw new RocketException('Account not exists. Service Id: ' . $serviceId);
        }

        return $this->model->ofServiceId($serviceId)->update($update);
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
        if ($this->getAccountByServiceId($serviceId)) {
            throw new RocketException('Account already exists. Service Id: ' . $serviceId);
        }

        $port = $this->getAvailablePort();
        $account = $this->create([
                'passwd' => $password,
                'port' => $port,
                'transfer_enable' => $bandwidth,
                'service_id' => $serviceId
            ]);
        if ($account && $this->fromRecycleBin) {
            $this->recycleBinRepo->delete($port);
        }

        return $account;
    }

    /**
     * 根据 Service Id 更改账号密码
     * 
     * @param  int $serviceId Service id
     * @param  string $password 密码
     *
     * @return bool
     */
    public function changePassword($serviceId, $password) 
    {
        return $this->updateByServiceId($serviceId, [
                'passwd' => $password
            ]);
    }

    /**
     * 根据 Service Id 暂停
     * 
     * @param  int $serviceId Service id
     *
     * @return bool
     */
    public function suspend($serviceId) 
    {
        return $this->updateByServiceId($serviceId, [
                'enable' => ShadowsocksR::STATUS_DISABLE
            ]);
    }

    /**
     * 根据 Service Id 恢复账号
     * 
     * @param  int $serviceId Service id
     *
     * @return bool
     */
    public function unsuspend($serviceId) 
    {
        return $this->updateByServiceId($serviceId, [
                'enable' => ShadowsocksR::STATUS_ENABLE
            ]);
    }

    /**
     * 根据 Service Id 删除
     * 
     * @param  int $serviceId Service id
     *
     * @return bool
     */
    public function terminate($serviceId) 
    {
        $account = $this->getAccountByServiceId($serviceId);

        $this->recycleBinRepo->recycle($account->port);
        
        return $this->model->ofServiceId($serviceId)->delete();
    }

}
