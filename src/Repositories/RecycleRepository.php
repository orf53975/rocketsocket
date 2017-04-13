<?php 

namespace Rocketsocket\Repositories;

use Rocketsocket\Models\Recycle;

class RecycleRepository extends Repository 
{
    public function __construct() 
    {
        $this->model = new Recycle;
    }

    public function getPort() 
    {
        return $this->model->first();
    }

    public function delete($port) 
    {
        $this->model->ofPort($port)->delete();
    }
}
