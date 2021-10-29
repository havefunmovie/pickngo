<?php

namespace LivewireUI\Modal;

use Illuminate\Support\Facades\View;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LivewireModalServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('livewire-ui-modal')
            ->hasConfigFile()
            ->hasViews();
    }

    public function bootingPackage(): void
    {
        Livewire::component('livewire-ui-modal', Modal::class);

        View::composer('livewire-ui-modal::modal', function ($view) {
            if (config('livewire-ui-modal.include_js', true)) {
                $view->jsPath = __DIR__.'/../public/modal.js';
            }

            if (config('livewire-ui-modal.include_css', false)) {
                $view->cssPath = __DIR__ . '/../public/modal.css';
            }
        });
    }
}
