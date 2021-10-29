<?php

namespace Cafesource\Foundation;

use Illuminate\Support\Collection;

class Filter
{
    protected $listeners = [];
    private   $lastValue;

    public function __construct()
    {
        $this->listeners = collect([]);
    }

    /**
     * @param string   $name
     * @param callable $callback
     * @param int      $arguments
     * @param int      $priority
     *
     * @return $this
     */
    public function add( string $name, callable $callback, int $arguments = 1, int $priority = 20 ) : Filter
    {
        $this->listeners->push([
            'name'      => $name,
            'callback'  => $callback,
            'priority'  => $priority,
            'arguments' => $arguments
        ]);

        return $this;
    }

    /**
     * @param $name
     *
     * @return bool
     */
    public function has( $name ) : bool
    {
        $count = $this->listeners->where('name', $name)->count();
        return $count > 0;
    }

    /**
     * @param $name
     *
     * @return Collection
     */
    public function listeners( $name ) : Collection
    {
        return $this->listeners->where('name', $name)->sortBy('priority');
    }

    /**
     * @param $name
     * @param $value
     *
     * @return mixed
     */
    public function apply( $name, $value )
    {
        $this->lastValue = $value;
        if ( $this->has($name) ) {
            $this->listeners($name)->each(function ( $listener ) use ( $name, $value ) {
                $parameters = [];
                $args[ 0 ]  = $this->lastValue;
                for ( $i = 0; $i < $listener[ 'arguments' ]; $i++ ) {
                    $value        = $args[ $i ] ?? null;
                    $parameters[] = $value;
                }

                $this->lastValue = call_user_func_array($listener[ 'callback' ], $parameters);
            });
        }

        return $this->lastValue;
    }

    /**
     * @param     $name
     */
    public function remove( $name )
    {
        $this->listeners->forget($name);
    }

    /**
     */
    public function removeAll()
    {
        $this->listeners = collect([]);
    }
}