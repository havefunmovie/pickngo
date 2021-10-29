<?php

namespace App\Http\Livewire\Admin\Settings\ScanningServicesPrice;

use App\Models\Services;
use Livewire\Component;

class Index extends Component
{
    public $services;

    public function mount()
    {
        $this->services = Services::where('service_type', 'scanning')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.admin.settings.scanning-services-price.index');
    }
}
