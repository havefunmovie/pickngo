<?php

namespace App\Http\Livewire\Home\Panel\Services\PickupContent\Pickup;

use Livewire\Component;

class ServicesGetQuote extends Component
{
//    use WithPagination;

    public $data;
    public $mServiceSummary = [];

//    public $users;

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
        return view('livewire.home.panel.services.pickup-content.pickup.get-quote', compact('validateError'), [
        ]);
    }

    public function selectService($serviceName) {
        $desired_object= array_filter($this->mServiceSummary, function($item) use ($serviceName) {
            return $item['name'] == $serviceName;
        });
        $this->emit('m_step', '2');
        $this->emit('get_service',$this->data, $desired_object);
        $this->emit('get_payment',$this->data, $desired_object);
    }

}
