<?php

namespace App\Http\Livewire\Admin\Settings\UserServicesPrice;

use App\Models\Services;
use Livewire\Component;

class Index extends Component
{
    public $services;

    public function mount()
    {
        $this->services = Services::where('service_type', 'user')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.admin.settings.user-services-price.index');
    }
}
