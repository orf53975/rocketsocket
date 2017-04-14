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
        $this->model->ofPort($port)->delete();
    }
}
