<?php

namespace App\Traits;

trait CacheTrait {
    /** @var array<string,mixed> $cache */
    protected array $cache = [];

    /**
     * If a value is found in the cache with the given key, it will be returned.
     * If not, the callable will be executed, the result will be stored
     * in the cache with the given key and the result will be returned.
     * @template T
     * @param string $key
     * @param callable(): T $fn
     * @return T
     */
    public function getFromCache(string $key, callable $fn): mixed
    {
        if (!array_key_exists($key, $this->cache)) {
            $this->cache[$key] = $fn();
        }
        return $this->cache[$key];
    }
}