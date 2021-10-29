<?php

namespace App\Http\Livewire\Admin\Settings\AgentServicesPrice;

use App\Models\Services;
use Livewire\Component;

class Index extends Component
{
    public $services;

    public function mount()
    {
        $this->services = Services::where('service_type', 'agent')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.admin.settings.agent-services-price.index');
    }
}
