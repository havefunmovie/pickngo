<?php

namespace App\Http\Livewire\Admin\Agent\Faxing\Details;

use Livewire\Component;

class GetQuote extends Component
{
    public $data, $validateError, $api_key , $returnAmount,$paidAmount;

    protected $listeners = [
        'getQuote' => 'getQuote'
    ];

    public function getQuote($data) {
        $this->data = $data;
    }

    public function prev() {
        $this->emit('preview_step');
    }

    public function selectService($payedBy) {
        $this->data['payedBy'] = $payedBy;
        $this->emit('next_step');
        $this->emit('get_label_faxing',$this->data);
    }

    public function calculate()
    {
        
        if(round(abs($this->data['price'] <= $this->paidAmount)))
            $this->returnAmount = round(abs($this->data['price'] - $this->paidAmount),2);
        else
            $this->returnAmount = 'Amount should be equal or greater than service price';
    }

    public function render()
    {
        $data = $this->data;
        return view('livewire.admin.agent.faxing.details.get-quote', compact('data'));
    }
}
