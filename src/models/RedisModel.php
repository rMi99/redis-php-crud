<?php

class RedisModel
{
    private $client;

    public function __construct()
    {
        $config = include __DIR__ . '/../config/config.php';
        $this->client = new Redis();
        $this->client->connect($config['redis']['host'], $config['redis']['port']);

        if ($config['redis']['password']) {
            $this->client->auth($config['redis']['password']);
        }
    }

    public function set($key, $value, $expiration = 0)
    {
        if ($expiration > 0) {
            return $this->client->setex($key, $expiration, $value);
        } else {
            return $this->client->set($key, $value);
        }
    }

    public function get($key)
    {
        return $this->client->get($key);
    }

    public function delete($key)
    {
        return $this->client->del($key);
    }

    public function getAllKeys()
    {
        return $this->client->keys('*');
    }

    public  function delete()
    {
        return $this->client->del();
    }
}
