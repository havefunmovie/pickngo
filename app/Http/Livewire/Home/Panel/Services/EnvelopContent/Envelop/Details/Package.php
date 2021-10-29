<?php

namespace App\Http\Livewire\Home\Panel\Services\EnvelopContent\Envelop\Details;

use Livewire\Component;
use Session;

class Package extends Component
{
    public $package;

    public $validated;
    public $loadingMode = false;

    protected array $rules = [
        'package.weight' => 'required|numeric|max:3',
        'package.weight-type' => 'required',
        'package.type' => 'required',
        'package.length' => 'required|numeric|max:15|min:1',
        'package.width' => 'required|numeric|max:15|min:1',
        'package.height' => 'required|numeric|max:3|min:1',

        'package.insurance' => 'numeric',
        'package.desc_of_content' => 'required|string|min:12',
        'package.country' => 'string',
        'package.value_of_content' => 'numeric',
        'package.unit' => 'numeric'
    ];

    protected $listeners = [
        'edit_pack' => 'editPackage',
        'loading_mode' => 'setLoadingMode'
    ];

    public function mount() {
        if (Session::has('weight')) {
            $this->package['weight'] = session('weight');
            $this->package['weight-type'] = session('weight-type');
            $this->package['length'] = session('length');
            $this->package['width'] = session('width');
            $this->package['height'] = session('height');
            $this->package['type'] = session('type');
            $this->package['country'] = session('country');
            $this->package['value_of_content'] = session('value_of_content');
            $this->package['unit'] = session('unit');
            $this->package['desc_of_content'] = session('desc_of_content');
            $this->package['insurance'] = session('insurance');
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
        $this->loadingMode = true;
    }

    public function back()
    {
        $this->emitUp('preview_step');
    }

    public function render()
    {
        if (isset($this->package['weight-type'])) {
            if ($this->package['weight-type'] == 'LBS') {
                $this->package['type'] = 'IN';
            } else {
                $this->package['type'] = 'CM';
            }
        }
        $validated = $this->validated;
        return view('livewire.home.panel.services.envelop-content.envelop.details.package', compact('validated'));
    }

    /**
     * @param bool $loadingMode
     */
    public function setLoadingMode(bool $loadingMode): void
    {
        $this->loadingMode = $loadingMode;
    }
}
