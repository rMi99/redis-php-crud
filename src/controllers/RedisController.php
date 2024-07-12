<?php

require_once __DIR__ . '/../models/RedisModel.php';

class RedisController
{
    private $model;

    public function __construct()
    {
        $this->model = new RedisModel();
    }

    public function create($key, $value, $expiration = 0)
    {
        return $this->model->set($key, $value, $expiration);
    }

    public function read($key)
    {
        return $this->model->get($key);
    }

    public function update($key, $value, $expiration = 0)
    {
        return $this->model->set($key, $value, $expiration);
    }

    public function delete($key)
    {
        return $this->model->delete($key);
    }

    public function listKeys()
    {
        return $this->model->getAllKeys();
    }
}
