<?php

namespace App\Http\Livewire\Home\Panel\Services\MailboxContent\Mailbox;

use App\Models\Mailboxes;
use App\Models\MailboxPrices;
use Livewire\Component;

class ServicesReviewPayment extends Component
{
    public $data;
    public $prices;
    public $final_payable = 0;
    public $packDetail = 1;
    public $box_detail;

    protected $listeners = [
        'review' => 'review'
    ];

    public function review($data) {
        $this->data = $data;
        $this->prices = MailboxPrices::where('agent_id', $data['agent'])->get()->first();
        $this->box_detail = Mailboxes::where('id', $data['box_id'])->first();
        $this->final_payable = 0;
        switch ($data['mailbox_type']) {
            case 'personal':
                $this->final_payable += $this->prices['personal_mode'];
                break;
            case 'personal_plus':
                $this->final_payable += $this->prices['personal_plus_mode'];
                break;
            case 'business':
                $this->final_payable += $this->prices['business_mode'];
                break;
            case 'corporate':
                $this->final_payable += $this->prices['corporate_mode'];
                break;
        }

        $this->final_payable +=
            $data['price'] +
            (isset($data['customer_2']) ? $this->prices['customer_2'] : 0) +
            (isset($data['customer_3']) ? $this->prices['customer_3'] : 0) +
            ($data['key'] ? $this->prices['rental_fee'] : 0) +
            ($data['key'] ? $this->prices['refundable_deposit'] : 0);

        $this->data['final_payable'] = $this->final_payable;

        $this->emit('get_payment', $this->data);
    }

    public function edit() {
        $this->emit('m_step', '');
    }

    public function packageDetailToggle() {
        $this->packDetail == 0 ? $this->packDetail = 1 : $this->packDetail = 0;
    }

    public function render()
    {
        return view('livewire.home.panel.services.mailbox-content.mailbox.review-payment');
    }
}
