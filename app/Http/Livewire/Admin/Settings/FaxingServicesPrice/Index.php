<?php

namespace App\Http\Livewire\Admin\Settings\FaxingServicesPrice;

use App\Models\Services;
use Livewire\Component;

class Index extends Component
{
    public $services;

    public function mount()
    {
        $this->services = Services::where('service_type', 'faxing')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.admin.settings.faxing-services-price.index');
    }
}
