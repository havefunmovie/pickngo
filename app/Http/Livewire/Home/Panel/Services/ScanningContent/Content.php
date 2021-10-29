<?php

namespace App\Http\Livewire\Home\Panel\Services\ScanningContent;

use App\Http\Livewire\PaypalEnvironment;
use App\Models\OrderScanning;
use App\Models\Transactions;
use Livewire\Component;
use Session;

class Content extends Component
{
    public $current, $services, $data;

    protected $listeners = [
        'm_step' => 'myStep',
        'edit_scanning' => 'editScanning'
    ];

    public function mount($services, $token) {
        $this->services = $services;
        if ($token) {
            $paypal = new PaypalEnvironment();
            $capture = $paypal->getOrderStatus($token);

            if (!is_string($capture) && $capture->status === 'COMPLETED') {
                $trans = Transactions::where('trans_code', $token)->first();
                $data = OrderScanning::where('id', $trans['scanning_id'])->with('agent')->get()->first();

                $this->current = 3;
                $this->data = $data;
                $this->data['price'] = $trans['price'];
                session()->flash('payment_success', 'Payment Successful!');
            } else {
                Transactions::where('trans_code', $token)->update([
                    'status' => 'unsuccessful'
                ]);
                session()->flash('payment_fail', 'Payment Canceled!');
                redirect(route('home.services.scanning'));
            }
        }
    }

    public function myStep($step)
    {
        $this->current = $step;
    }

    public function editScanning($step, $data)
    {
        $this->current = $step;
        $this->emit('first_step', $data);
    }

    public function render()
    {
        return view('livewire.home.panel.services.scanning-content.content');
    }
}
