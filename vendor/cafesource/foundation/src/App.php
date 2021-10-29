<?php

namespace Cafesource\Foundation;

class App extends Autoload
{
    protected array $config   = [];
    protected array $autoload = [];

    public function __construct( $config )
    {
        $this->config = $config;

        parent::__construct('app', $config);
    }

    /**
     * @return array
     */
    public function configs() : array
    {
        return $this->config;
    }

    /**
     * @return array
     */
    public function serviceProviders() : array
    {
        return $this->get('providers', []);
    }

    /**
     * @return array
     */
    public function routes() : array
    {
        return $this->get('routes', []);
    }

    /**
     * @param string $name
     * @param array  $options
     * @param        $path
     */
    public function addRoute( string $name, $path, array $options = [] ) : App
    {
        $this->filter('routes', function ( $routes ) use ( $name, $options, $path ) {
            $routes[ $name ] = array_merge(['path' => $path], $options);

            return $routes;
        });

        return $this;
    }

    /**
     * @return mixed|null
     */
    public function livewireComponents()
    {
        return $this->get('livewire_components', []);
    }

    /**
     * @param string|array $component
     * @param null         $path
     */
    public function addLivewireComponent( $component, $path = null ) : App
    {
        $this->filter('livewire_components', function ( $components ) use ( $component, $path ) {
            if ( is_array($component) )
                $components = array_merge($components, $component);
            else
                $components[ $component ] = $path;

            return $components;
        });

        return $this;
    }

    /**
     * @param       $name
     * @param array $items
     *
     * @return Autoload
     */
    public function autoload( $name, array $items = [] ) : Autoload
    {
        if ( array_key_exists($name, $this->autoload) )
            return $this->autoload[ $name ];

        $this->autoload[ $name ] = new Autoload($name, $items);

        return $this->autoload[ $name ];
    }

    /**
     * @param null $key
     *
     * @return mixed
     */
    public function getAutoload( $key = null )
    {
        if ( !is_null($key) && array_key_exists($key, $this->autoload) )
            return $this->autoload[ $key ];

        return $this->autoload;
    }
}
