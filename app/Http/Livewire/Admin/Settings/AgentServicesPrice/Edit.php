<?php

namespace App\Http\Livewire\Admin\Settings\AgentServicesPrice;

use App\Models\Services;
use Livewire\Component;

class Edit extends Component
{
    public $validated, $services;

    protected array $rules = [
        'services.service_percentage' => 'required|numeric',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function edit() {
        $this->validate();

        Services::where('id', $this->services['id'])->update([
            'service_percentage' => $this->services['service_percentage'],
        ]);

        return redirect()->route('admin.settings.index');
    }

    public function mount($id) {
        $this->services = Services::where('id', $id)->first()->toArray();
    }

    public function render()
    {
        return view('livewire.admin.settings.agent-services-price.edit')->layout('livewire.admin.master');
    }
}
