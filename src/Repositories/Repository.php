<?php

namespace Rocketsocket\Repositories;

abstract class Repository
{
    protected $model;

    public function find($id, array $fields = ['*'])
    {
        return $this->model->find($id, $fields);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function __call($method, $parameters) 
    {
        if (method_exists($this->model, $method)) {
            return $this->model->{$method}(...$parameters);
        }
    }
}
