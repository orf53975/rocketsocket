<?php

namespace Rocketsocket\Repositories;

abstract class Repository
{
    protected $model;

    protected function find(int $id, array $fields = ['*'])
    {
        return $this->model->find($id, $fields);
    }

    protected function create(array $data)
    {
        return $this->model->create($data);
    }
}
