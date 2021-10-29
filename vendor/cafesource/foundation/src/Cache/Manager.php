<?php

namespace Cafesource\Foundation\Cache;

class Manager
{
    protected $name   = null;
    protected $prefix = null;

    public function __construct( $name )
    {
        $this->name = $name;
    }

    public function has( $key )
    {
        $key = $this->getKey($key);
    }

    public function set()
    {
    }

    public function get()
    {
    }

    public function add()
    {
    }

    public function remove()
    {
    }

    public function update()
    {
    }

    public function getKey( $key )
    {
        return "{$this->name}:{$key}";
    }
}