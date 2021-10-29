<?php

namespace App\Http\Livewire\Home\Panel\Services\MailboxContent;

use App\Http\Livewire\PaypalEnvironment;
use App\Models\MailboxPrices;
use App\Models\Transactions;
use App\Models\UserMailboxes;
use Livewire\Component;

class Content extends Component
{
    public $services;
    public $current;
    public $api_key;
    public $data;

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
                $data = UserMailboxes::where('id', $trans['user_mailbox_id'])
                    ->with(['box', 'boxtype.agent'])
                    ->get()->first();
                $prices = MailboxPrices::where('agent_id', $data['boxtype']['agent']['id'])->first();

                $prices['price'] = $data['boxtype']['price'];

                $this->current = 2;
                $this->data['id'] = $data['id'];
                $this->data['tracking_code'] = $data['tracking_code'];
                $this->data['user_mailbox_id'] = $trans['user_mailbox_id'];
                $this->data['ren_date'] = $data['renewal_date'];
                $this->data['customer_1'] = $data['customer_1'];
                $this->data['customer_2'] = $data['customer_2'];
                $this->data['customer_3'] = $data['customer_3'];
                $this->data['key_status'] = $data['key_status'];
                $this->data['mailbox_type'] = $data['mailbox_type'];
                $this->data['prices'] = $prices;
                $this->data['number'] = $data['box']['number'];
                $this->data['box_id'] = $data['box']['id'];
                $this->data['type'] = ucwords($data['boxtype']['box_type'] . ' - ' . $data['boxtype']['expired_time'] . ' - ' . $data['boxtype']['expired_type']);
                $this->data['name'] = $data['boxtype']['agent']['name'];
                $this->data['address'] = $data['boxtype']['agent']['address'];
                $this->data['mobile'] = $data['boxtype']['agent']['mobile'];
                $this->data['service_percentage'] = $trans['percentage'];
                $this->data['total_price'] = $trans['price'];
                session()->flash('payment_success', 'Payment Successful!');
            } else {
                Transactions::where('trans_code', $token)->update([
                    'status' => 'unsuccessful'
                ]);
                session()->flash('payment_fail', 'Payment Canceled!');
                redirect(route('home.services.mailbox'));
            }
        }
    }

    public function myStep($step)
    {
        $this->current = $step;
    }

    public function render()
    {
        return view('livewire.home.panel.services.mailbox-content.content');
    }
}
