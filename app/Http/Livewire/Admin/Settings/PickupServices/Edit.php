<?php

namespace App\Http\Livewire\Admin\Settings\PickupServices;

use App\Models\Services;
use Livewire\Component;

class Edit extends Component
{
    public $validated, $services;

    protected array $rules = [
        "services.service_percentage"        => 'required|string',
        "services.service_price"             => 'required|string',
        "services.urgent_price"              => 'required|string',
        "services.driver_percentage"         => 'required|string',

        "services.weight_limit"              => 'required|string',
        "services.weight_minimum"            => 'required|string',
        "services.weight_extra"              => 'required|string',
        "services.weight_extra_price"        => 'required|string',

        "services.dimensions_limit"          => 'required|string',
        "services.dimensions_minimum"        => 'required|string',
        "services.dimensions_extra"          => 'required|string',
        "services.dimensions_extra_price"    => 'required|string',

        "services.distance_limit"            => 'required|string',
        "services.distance_minimum"          => 'required|string',
        "services.distance_extra"            => 'required|string',
        "services.distance_extra_price"      => 'required|string',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function edit() {
        $this->validate();
        Services::updateOrInsert(
            ['service_type'         => 'pickup And Delivery'],
            [
                'service_percentage'    => $this->services['service_percentage'],
                'service_price'         => $this->services['service_price'],
                'urgent_price'          => $this->services['urgent_price'],
                'weight_limit'          => $this->services['weight_limit'],
                'weight_minimum'        => $this->services['weight_minimum'],
                'weight_extra'          => $this->services['weight_extra'],
                'weight_extra_price'    => $this->services['weight_extra_price'],
                'dimensions_limit'      => $this->services['dimensions_limit'],
                'dimensions_minimum'    => $this->services['dimensions_minimum'],
                'dimensions_extra'      => $this->services['dimensions_extra'],
                'dimensions_extra_price'=> $this->services['dimensions_extra_price'],
                'distance_limit'        => $this->services['distance_limit'],
                'distance_minimum'      => $this->services['distance_minimum'],
                'distance_extra'        => $this->services['distance_extra'],
                'distance_extra_price'  => $this->services['distance_extra_price'],
            ]
        );

        return redirect()->route('admin.settings.index');
    }

    public function mount($id) {
        $this->services = Services::where('id', $id)->first()->toArray();
    }

    public function render()
    {
        return view('livewire.admin.settings.pickup-services.edit')->layout('livewire.admin.master');
    }
}
