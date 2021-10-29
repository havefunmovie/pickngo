<?php

namespace App\Http\Livewire\Home\Panel\Services\PickupContent\Pickup\Details;

use Livewire\Component;
use Session;

class Package extends Component
{

    public $package;

    public $validated;

    protected array $rules = [
        'package.weight' => 'required|numeric',
        'package.length' => 'required|numeric',
        'package.width' => 'required|numeric',
        'package.height' => 'required|numeric',
        'package.service_type' => 'sometimes',
    ];

    protected $listeners = [
        'edit_pack' => 'editPackage'
    ];

    public function mount() {
        if (Session::has('weight')) {
            $this->package['weight'] = session('weight');
            $this->package['length'] = session('length');
            $this->package['width'] = session('width');
            $this->package['height'] = session('height');
            $this->package['type'] = session('type');
        }
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function editPackage($package)
    {
        $this->package = $package;
    }

    public function savePackage()
    {
        $this->validate();
        $this->emitUp('next_step','package',$this->package);
    }

    public function back()
    {
        $this->emitUp('preview_step');
    }

    public function render()
    {
        $validated = $this->validated;
        return view('livewire.home.panel.services.pickup-content.pickup.details.package', compact('validated'));
    }
}
