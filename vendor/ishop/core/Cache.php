<?php

namespace ishop;

define('EXTENSION', '.txt');


class Cache
{
    use TSingleton;

    private \Predis\Client $redis;

    private function __construct()
    {
        $cache = require_once CONF . '/config_cache.php';

        $this->redis = new \Predis\Client($cache);
        $this->redis->connect();
    }

    public function __destruct()
    {
        $this->redis->disconnect();
    }

    public function set(string $key, string $value, int $seconds = 3600)
    {
        if ($seconds > 0) {
            return $this->redis->setex($key, $seconds, $value);
        }

        return $this->redis->set($key, $value);
    }

    public function get(string $key)
    {
        $value = $this->redis->get($key);
        return $value;
    }

    public function delete($key)
    {
        return $this->redis->del($key);
    }
}

?>