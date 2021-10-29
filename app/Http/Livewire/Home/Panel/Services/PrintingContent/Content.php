<?php

namespace App\Http\Livewire\Home\Panel\Services\PrintingContent;

use App\Http\Livewire\PaypalEnvironment;
use App\Models\OrderPrinting;
use App\Models\Transactions;
use Livewire\Component;

class Content extends Component
{
    public $current, $services, $data;

    protected $listeners = [
        'm_step' => 'myStep'
    ];

    public function mount($services, $token) {
        $this->services = $services;
        if ($token) {
            $paypal = new PaypalEnvironment();
            $capture = $paypal->getOrderStatus($token);

            if (!is_string($capture) && $capture->status === 'COMPLETED') {
                $trans = Transactions::where('trans_code', $token)->first();
                $data = OrderPrinting::where('id', $trans['printing_id'])->with('agent')->get()->first();

                $this->current = 3;
                $this->data = $data;
                $this->data['price'] = $trans['price'];
                session()->flash('payment_success', 'Payment Successful!');
            } else {
                Transactions::where('trans_code', $token)->update([
                    'status' => 'unsuccessful'
                ]);
                session()->flash('payment_fail', 'Payment Canceled!');
                redirect(route('home.services.printing'));
            }
        }
    }

    public function myStep($step)
    {
        $this->current = $step;
    }

    public function render()
    {
        return view('livewire.home.panel.services.printing-content.content');
    }
}
