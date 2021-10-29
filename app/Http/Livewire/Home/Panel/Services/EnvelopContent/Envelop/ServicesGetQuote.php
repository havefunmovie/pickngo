<?php

namespace App\Http\Livewire\Home\Panel\Services\EnvelopContent\Envelop;

use App\Models\Taxes;
use Livewire\Component;

class ServicesGetQuote extends Component
{
    public $data;
    public $mServiceSummary = [];

    private $validateError;

    protected $listeners = [
        'get_quote' => 'getQuote'
    ];

    public function getQuote($params, $mServiceSummary) {
        $this->data = $params;
        $this->mServiceSummary = $mServiceSummary;
    }

    public function render()
    {
        $validateError = $this->validateError;
        return view('livewire.home.panel.services.envelop-content.envelop.get-quote', compact('validateError'));
    }

    public function selectService($code) {
        $desired_object = array_filter($this->mServiceSummary, function($item) use ($code) {
            return $item['service_code'] == $code;
        });
        $desired_object = array_shift($desired_object);

        $taxes = Taxes::where('province', $this->data['from']['province'])->first();
        $this->data['package']['tax'] = $taxes['tax'] ?? 0;
        $desired_object['negotiated_charge'] = '$'.((float) ltrim($desired_object['negotiated_charge'], '$') * ($taxes['tax'] ?? 0) + ($this->data['package']['insurance'] ?? 0));
        $this->emit('m_step', '2');
        $this->emit('get_service',$this->data, $desired_object);
        $this->emit('get_payment',$this->data, $desired_object);
    }
}
