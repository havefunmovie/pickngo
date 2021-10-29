<?php

namespace Cafesource\Foundation;

use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container as Application;
use Cafesource\Foundation\Facades\Cafesource as Foundation;

class CafesourceServiceProvider extends ServiceProvider
{
    protected string $config = __DIR__ . '/../config/cafesource.php';

    /**
     * @return mixed|void
     */
    public function register()
    {
        $this->mergeConfig();

        $this->registerManager($this->app);
        $this->registerBindings($this->app);

        $this->mergeServiceProviders(Foundation::serviceProviders());
    }

    public function boot()
    {
        $this->loadRoutes();

        $this->publishes([
            $this->config => config_path('cafesource.php')
        ]);

        $this->loadLivewireComponents();
    }


    /**
     * @param Application $app
     */
    protected function registerManager( Application $app )
    {
        $app->singleton('cafesource.foundation', function ( $app ) {
            return new App($app[ 'config' ][ 'cafesource' ]);
        });
    }

    /**
     * @param Application $app
     */
    protected function registerBindings( Application $app )
    {
        $app->bind('cafesource.foundation', function ( $app ) {
            return new App($app[ 'config' ][ 'cafesource' ]);
        });
    }

    /**
     * @param $serviceProviders
     */
    public function mergeServiceProviders( $serviceProviders )
    {
        foreach ( $serviceProviders as $provider ) {
            $this->app->register($provider);
        }
    }

    /**
     * Merge config
     */
    protected function mergeConfig()
    {
        $this->mergeConfigFrom($this->config, 'cafesource');
    }

    /**
     * Loads the admin livewire components
     */
    private function loadLivewireComponents()
    {
        foreach ( Foundation::livewireComponents() as $alias => $component ) {
            Livewire::component($alias, $component);
        }
    }

    public function loadRoutes()
    {
        foreach ( Foundation::routes() as $value ) {
            $route = Route::prefix($value[ 'prefix' ]);
            if ( isset($value[ 'middleware' ]) )
                $route->middleware($value[ 'middleware' ]);

            if ( isset($value[ 'name' ]) )
                $route->name($value[ 'name' ]);

            if ( isset($value[ 'namespace' ]) )
                $route->namespace($value[ 'namespace' ]);

            $route->group($value[ 'path' ]);
        }
    }
}
