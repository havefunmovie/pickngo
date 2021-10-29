<?php

namespace App\Http\Livewire\Admin\Agent\Envelop;

use App\Models\Services;
use Livewire\Component;

class Create extends Component
{
    public $currentStep = 1;

    public $services;

    protected $listeners = [
        'next_step' => 'nextStep',
        'preview_step' => 'previewStep',
        'create_quote' => 'getQuote'
    ];

    public function mount() {
        $this->services = Services::all();
    }

    public function previewStep()
    {
        $this->currentStep -= 1;
    }

    public function nextStep()
    {
        $this->currentStep += 1;
    }

    public function getQuote($data) {
        $this->emit('get_quote',$data);
    }

    public function render()
    {
        return view('livewire.admin.agent.envelop.create')->layout('livewire.admin.master');
    }
}
