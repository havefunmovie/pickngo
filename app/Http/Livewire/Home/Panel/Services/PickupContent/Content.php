<?php

namespace App\Http\Livewire\Home\Panel\Services\PickupContent;

use App\Http\Livewire\PaypalEnvironment;
use App\Models\AgentService;
use App\Models\OrderPackage;
use App\Models\Transactions;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Content extends Component
{
    public $current, $services, $api_key, $data;

    protected $listeners = [
        'm_step' => 'myStep',
        'edit_shipping' => 'editShipping'
    ];

    public function mount($services, $token) {
        $this->services = $services;
        $this->api_key = AgentService::with('agent')->get();
        $this->api_key = $this->api_key->where('agent.level', 'admin')->first();

        if ($token) {
            $paypal = new PaypalEnvironment();
            $capture = $paypal->getOrderStatus($token);
            if (!is_string($capture) && $capture->status === 'COMPLETED') {
                $trans = Transactions::where('trans_code', $token)->first();
                $data = OrderPackage::where('order_id', $trans['puckup_delivery_id'])->with('user')->get()->first();
                $this->current = 4;
                $this->data = $data;
                $this->data['price'] = $trans['price'];
            } else {
                Transactions::where('trans_code', $token)->update([
                    'status' => 'unsuccessful'
                ]);
                redirect(route('home.services.pickup-delivery'));
            }
        }
    }

    public function myStep($step)
    {
        $this->current = $step;
        $this->dispatchBrowserEvent('name-updated');
    }

    public function editShipping($step, $data)
    {
        $this->current = $step;
        $this->emit('first_step', $data);
    }

    public function render()
    {
        return view('livewire.home.panel.services.pickup-content.content');
    }
}
