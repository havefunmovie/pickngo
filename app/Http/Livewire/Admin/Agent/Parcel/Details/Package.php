<?php

namespace App\Http\Livewire\Admin\Agent\Parcel\Details;

use Session;
use App\Models\Country;
use Livewire\Component;

class Package extends Component
{
    public $validated, $package;

    protected array $rules = [
        'package.weight'           => 'required|numeric',
        'package.length'           => 'required|numeric',
        'package.width'            => 'required|numeric',
        'package.height'           => 'required|numeric',
        'package.dimen-type'       => 'required',
        'package.weight-type'      => 'required'
    ];

    protected $listeners = [
        'set_package' => 'setPackage'
    ];

    public function mount() {
        if (Session::has('weight')) {
            $this->package['weight'] = session('weight');
            $this->package['weight-type'] = session('weight-type');
            $this->package['length'] = session('length');
            $this->package['width'] = session('width');
            $this->package['height'] = session('height');
            $this->package['dimen-type'] = session('dimen-type');
        }
    }

    public function setPackage($package) {
        $this->package = $package;
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function next() {
        $this->validate();
        $this->emit('sh_next_step', 'package', $this->package);
    }

    public function back() {
        $this->emit('sh_preview_step');
    }

    public function render()
    {
        if (isset($this->package['weight-type'])) {
            if ($this->package['weight-type'] == 'LBS') {
                $this->package['dimen-type'] = 'IN';
            } else {
                $this->package['dimen-type'] = 'CM';
            }
        }
        $validated = $this->validated;
        $countries = Country::orderByRaw("FIELD(id,38,231) DESC")->get();
        return view('livewire.admin.agent.parcel.details.package', compact('validated', $countries));
    }
}
