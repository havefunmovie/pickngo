<?php

namespace App\Http\Livewire\Admin\Settings\PrintingServicesPrice;

use App\Models\Services;
use Livewire\Component;

class Edit extends Component
{
    public $validated, $services;

    protected array $rules = [
        'services.color_type'       => 'required',
        'services.paper_type'       => 'required',
        'services.price_first_page' => 'required|numeric',
        'services.price_more_page'  => 'required|numeric',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function edit() {
        $this->validate();

        Services::where('id', $this->services['id'])->update([
            'color_type' => $this->services['color_type'],
            'paper_type' => $this->services['paper_type'],
            'price_first_page' => $this->services['price_first_page'],
            'price_more_page' => $this->services['price_more_page']
        ]);

        return redirect()->route('admin.settings.index');
    }

    public function mount($id) {
        $this->services = Services::where('id', $id)->first()->toArray();
    }

    public function render()
    {
        return view('livewire.admin.settings.printing-services-price.edit')->layout('livewire.admin.master');
    }
}
