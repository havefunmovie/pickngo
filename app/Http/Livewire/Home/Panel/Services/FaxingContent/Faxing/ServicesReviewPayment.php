<?php

namespace App\Http\Livewire\Home\Panel\Services\FaxingContent\Faxing;

use Livewire\Component;

class ServicesReviewPayment extends Component
{
    public $data = [];

    public $agentDetail;

    protected $listeners = [
        'get_service' => 'getService',
        'get_label' => 'getLabel',
    ];

    public function getService($data) {
        $this->data = $data;
        $this->emit('get_payment', $this->data);
    }

    public function getLabel($data) {
        $this->emit('get_review', $data);
    }

    public function agentDetailToggle() {
        $this->agentDetail == 0 ? $this->agentDetail = 1 : $this->agentDetail = 0;
    }

    public function edit() {
        $this->emit('edit_faxing', '', $this->data);
    }

    public function render()
    {
        return view('livewire.home.panel.services.faxing-content.faxing.review-payment');
    }
}
