<?php

namespace App\Http\Livewire\Admin\Settings\PickupServices;

use App\Models\Services;
use Livewire\Component;

class Index extends Component
{
    public $services;

    public function mount()
    {
        $this->services = Services::where('service_type', 'pickup And Delivery')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.admin.settings.pickup-services.index');
    }
}
