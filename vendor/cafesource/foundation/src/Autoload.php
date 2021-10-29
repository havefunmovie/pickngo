<?php

namespace Cafesource\Foundation;

use Illuminate\Support\Arr;

class Autoload
{
    /**
     * The autoload name
     *
     * @var $name
     */
    protected $name;

    /**
     * The autoload items is loaded
     *
     * @var array|mixed
     */
    protected array $items = [];

    /**
     * The default value
     *
     * @var array $default
     */
    protected array $default = [];

    /**
     * @var Filter
     */
    private Filter $filter;

    /**
     * Autoload constructor.
     *
     * @param       $name
     * @param array $items
     */
    public function __construct( $name, array $items = [] )
    {
        $this->name    = $name;
        $this->items   = $items;
        $this->default = $items;

        $this->filter = new Filter();
    }

    /**
     * @return array|mixed
     */
    public function items()
    {
        return $this->items;
    }

    /**
     * @param $key
     *
     * @return bool
     */
    public function has( $key ) : bool
    {
        return array_key_exists($key, $this->items);
    }

    /**
     * @param $key
     * @param $value
     *
     * @return $this
     */
    public function set( $key, $value ) : Autoload
    {
        $this->items[ $key ] = $value;
        return $this;
    }

    /**
     * @param      $key
     * @param      $value
     * @param null $default
     *
     * @return $this
     */
    public function add( $key, $value, $default = null ) : Autoload
    {
        $this->items[ $key ] = $value;

        if ( !is_null($default) )
            $this->default[ $key ] = $default;

        return $this;
    }

    /**
     * @param $key
     * @param $items
     *
     * @return $this
     */
    public function push( $key, $items ) : Autoload
    {
        $this->items[ $key ][] = $items;
        return $this;
    }

    /**
     * @param $items
     *
     * @return $this
     */
    public function merge( $items ) : Autoload
    {
        $this->items = array_merge($this->items, $items);
        return $this;
    }

    /**
     * @param      $key
     * @param null $default
     *
     * @return mixed|null
     */
    public function get( $key, $default = null )
    {
        $value = Arr::get($this->items, $key, $default);
        return $this->filter->apply($key, $value);
    }

    /**
     * @param $key
     *
     * @return mixed|null
     */
    public function default( $key )
    {
        return $this->default[ $key ] ?? null;
    }

    /**
     * @param $key
     * @param $callback
     *
     * @return $this
     */
    public function filter( $key, $callback ) : Autoload
    {
        $value = $this->get($key);

        if ( is_callable($callback) ) {
            $value = call_user_func_array($callback, [$value, $this->default($key)]);
        } else
            $value = $callback;

        $this->set($key, $value);
        return $this;
    }

    /**
     * @param          $key
     * @param callable $callable
     * @param int      $arguments
     * @param int      $priority
     *
     * @return $this
     */
    public function addFilter( $key, callable $callable, int $arguments = 1, int $priority = 10 ) : Autoload
    {
        $this->filter->add($key, $callable, $arguments, $priority);
        return $this;
    }

}
