<?php

namespace App\Http\Livewire\Admin\Settings\PrintingServicesPrice;

use App\Models\Services;
use Carbon\Carbon;
use Livewire\Component;

class Create extends Component
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

    public function create() {
        $this->validate();

        Services::create([
            'color_type' => $this->services['color_type'],
            'paper_type' => $this->services['paper_type'],
            'price_first_page' => $this->services['price_first_page'],
            'price_more_page' => $this->services['price_more_page'],
            'service_type' => 'printing',
        ]);

        return redirect()->route('admin.settings.index');
    }

    public function render()
    {
        return view('livewire.admin.settings.printing-services-price.create')->layout('livewire.admin.master');
    }
}
