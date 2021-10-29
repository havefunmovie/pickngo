<?php

namespace App\Http\Livewire\Home\Panel\Services\MailboxContent\Mailbox;

use Livewire\Component;

class ServicesDetails extends Component
{
    public $api_key;
    public $service;
    public $show = 1;

    protected $listeners = [
        'previous_step' => 'previousStep',
        'next_step' => 'nextStep',
    ];

    public function mount($services, $apiKey) {
        $this->api_key = $apiKey;
        foreach ($services as $service) {
            if ($service['service_type'] === 'user') {
                $this->service = $service;
                break;
            }
        }
    }

    public function previousStep() {
        $this->show -= 1;
    }

    public function nextStep($data = '')
    {
        $this->show += 1;
        if ($this->show > 3) {
            $this->emit('m_step', '1');
            $this->emit('review',$data);
        }
    }

    public function render()
    {
        return view('livewire.home.panel.services.mailbox-content.mailbox.details');
    }
}
