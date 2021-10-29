<?php

namespace App\Http\Livewire\Admin\Agent\Mailbox;

use Livewire\Component;

class Create extends Component
{
    public $currentStep = 1;

    protected $listeners = [
        'next_step' => 'nextStep'
    ];

    public function nextStep($typeId) {
        $this->currentStep += 1;
        $this->emit('step', $typeId);
    }

    public function render()
    {
        return view('livewire.admin.agent.mailbox.create')->layout('livewire.admin.master');
    }
}
