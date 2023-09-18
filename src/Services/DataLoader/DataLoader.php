<?php

namespace Leaseweb\Services\DataLoader;

use Leaseweb\Services\DataLoader\Loaders\LoaderInterface;

class DataLoader
{
    protected $loader;
    protected $data = [];
    protected $cache = null;

    public function __construct(LoaderInterface $loader)
    {
        $this->loader = $loader;
    }

    public function load()
    {
        $this->data = array_merge($this->data, $this->loader->parse());
        return $this;
    }

    public function get()
    {
        if ($this->existsInCache()) {
            return $this->fromCache();
        }

        return $this->addToCache($this->data);
    }

    protected function existsInCache() 
    {
        return isset($this->cache);
    }

    protected function fromCache() 
    {
        return $this->cache;
    }

    protected function addToCache($value) 
    {
        $this->cache = $value;

        return $value;
    }
}