<?php

namespace App\Http\Livewire\Home\Panel\Services\EnvelopContent\Envelop;

use Livewire\Component;

class ServicesReviewPayment extends Component
{
    public $data;
    public $from;
    public $to;
    public $package;

    public $final_payable;

    public $mServiceSummary = [];

    public $shipDetail = 1;

    public $packDetail = 1;

    protected $error = false;

    protected $listeners = [
        'get_service' => 'getService'
    ];

    public function mount() {
    }

    public function getService($params, $mServiceSummary) {
        $this->data = $params;
        $this->from = $this->data['from'];
        $this->to = $this->data['to'];
        $this->package = $this->data['package'];
        $this->mServiceSummary = $mServiceSummary;
    }

    public function shipDetailToggle() {
        $this->shipDetail == 0 ? $this->shipDetail = 1 : $this->shipDetail = 0;
    }

    public function packageDetailToggle() {
        $this->packDetail == 0 ? $this->packDetail = 1 : $this->packDetail = 0;
    }

    public function edit($param) {
//        dd($this->data);
        $this->emit('edit_shipping', $param, $this->data);
    }

    public function render()
    {
        $error = $this->error;
        return view('livewire.home.panel.services.envelop-content.envelop.review-payment', compact('error'));
    }
}
