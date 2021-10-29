<?php

namespace App\Http\Livewire\Home\Forms;

use Livewire\Component;
use Session;

class Package extends Component
{
    public $package_weight,$package_length=1,$package_height=1,$package_width=1,$package_unit = 1,$package_value,$package_description,$weight_type,$dimensions_type='inch',$package_type ='parcel',$envelop_size='standard';
    public $loadingMode = false;
    public $breakable, $replaceable, $signature, $protection, $description;

    protected $listeners = [
        'loading_mode' => 'setLoadingMode'
    ];

    protected $rules = [
        'package_type' => 'required',
        'package_weight' => 'required|numeric',
        'package_length' => 'required|numeric|min:1',
        'package_height' => 'required|numeric|min:1',
        'package_width' => 'required|numeric|min:1',
        'package_unit' => 'required|numeric|min:1',
        'package_value' => 'required|numeric|min:1',
        'package_description' => 'sometimes',
        'weight_type' => 'required',
        'dimensions_type' => 'required',
        'envelop_size' => 'sometimes',
        'breakable' => 'required',
        'replaceable' => 'required',
        'signature' => 'required',
        'protection' => 'required',
        'description' => 'required',
    ];
    
    public function render()
    {
        if (Session::has('EditPackage')) {
            $editData = Session::get('EditPackage');
            $this->package_type = $editData['package_type'];
            $this->package_weight = $editData['package_weight'];
            $this->package_length = $editData['package_length'];
            $this->package_height = $editData['package_height'];
            $this->package_width = $editData['package_width'];
            $this->package_unit = $editData['package_unit'];
            $this->package_value = $editData['package_value'];
            $this->package_description = $editData['package_description'];
            $this->dimensions_type = $editData['dimensions_type'];
            $this->envelop_size = $editData['envelop_size'];
            $this->breakable = $editData['breakable'];
            $this->replaceable = $editData['replaceable'];
            $this->signature = $editData['signature'];
            $this->protection = $editData['protection'];
            $this->description = $editData['description'];
        }
        return view('livewire.home.forms.package');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function savePackageInfo()
    {
        $validated = $this->validate();

        if($validated['package_type'])
            $validated['dimensions_type'] = 'CM';

        if($validated['envelop_size'] == 'standard')
        {   
            $validated['package_length'] = 22;
            $validated['package_height'] = 11;
        }
        if($validated['envelop_size'] == 'A5')
        {   
            $validated['package_length'] = 23;
            $validated['package_height'] = 16;
        }
        if($validated['envelop_size'] == 'A4')
        {   
            $validated['package_length'] = 32;
            $validated['package_height'] = 23;
        }
        $this->emit('setPackageInfo', $validated);
        
        // this part commented beacuse UPS API doese not work. for getting api price just uncomment this part
        // $this->emit('setStep', 6);
        // $this->loadingMode = true;
    }

    public function setLoadingMode(bool $loadingMode): void
    {
        $this->loadingMode = $loadingMode;
    }

    public function Breakable($answer)
    {
        $this->breakable = $answer;
    }

    public function Replaceable($answer)
    {
        $this->replaceable = $answer;
    }

    public function Signature($answer)
    {
        $this->signature = $answer;
    }

    public function Protection($answer)
    {
        $this->protection = $answer;
    }

    public function Description($answer)
    {
        $this->description = $answer;
    }
}