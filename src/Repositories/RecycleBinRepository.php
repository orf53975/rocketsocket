<?php 

namespace Rocketsocket\Repositories;

use Rocketsocket\Models\RecycleBin;

class RecycleBinRepository extends Repository 
{
    public function __construct() 
    {
        $this->model = new RecycleBin;
    }

    public function getPort() 
    {
        return $this->model->first();
    }

    public function delete($port) 
    {
        return $this->model->ofPort($port)->delete();
    }

    public function recycle($port) 
    {
        return $this->model->create([
                'port' => $port
            ]);
    }
}
