<?php

use Cafesource\Foundation\Facades\Cafesource;
use Illuminate\Support\Facades\App;

if ( !function_exists('autoload') ) {
    /**
     * Autoload
     *
     * @param       $name
     * @param array $data
     *
     * @return mixed
     */
    function autoload( $name, $data = [] )
    {
        return Cafesource::autoload($name, $data);
    }
}