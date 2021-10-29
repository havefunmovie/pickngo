<?php

namespace App\Http\Livewire\Home\Panel\Services\EnvelopContent;

use App\Http\Livewire\PaypalEnvironment;
use App\Models\AgentService;
use App\Models\OrderEnvelop;
use App\Models\Transactions;
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
                $trans = Transactions::where('trans_code', $token)->where('status', 'pending')->first();
                $data = OrderEnvelop::where('id', $trans['envelop_id'])->with('user')->get()->first();
                $this->current = 4;
                $this->data = $data;
                $this->data['price'] = $trans['price'];
                session()->flash('payment_success', 'Payment Successful!');
            } else {
                $result = Transactions::where('trans_code', $token)->where('status', 'pending')->update([
                    'status' => 'unsuccessful'
                ]);
                if ($result) {
                    session()->flash('payment_fail', 'Payment Canceled!');
                }
                redirect(route('home.services.envelop'));
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
        $this->dispatchBrowserEvent('name-updated');
        $this->emit('first_step', $data);
    }

    public function render()
    {
        return view('livewire.home.panel.services.envelop-content.content');
    }
}
