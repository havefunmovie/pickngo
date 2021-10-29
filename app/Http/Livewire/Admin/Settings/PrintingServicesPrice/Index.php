<?php

namespace App\Http\Livewire\Admin\Settings\PrintingServicesPrice;

use App\Models\Services;
use Livewire\Component;

class Index extends Component
{
    public $services;

    public function mount()
    {
        $this->services = Services::where('service_type', 'printing')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.admin.settings.printing-services-price.index');
    }
}
