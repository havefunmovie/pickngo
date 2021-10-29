<?php

namespace App\Http\Livewire\Home\Panel\Services\MailboxContent\Mailbox;

use App\Http\Livewire\Admin\Agent\GenerateTrackingNumber;
use App\Http\Livewire\PaypalEnvironment;
use App\Models\Country;
use App\Models\MailboxTypes;
use App\Models\PaymentInfo;
use App\Models\Services;
use App\Models\Temp;
use App\Models\Transactions;
use App\Models\UserMailboxes;
use Carbon\Carbon;
use Livewire\Component;

class Payment extends Component
{
    public $validated;

    public $payment;
    public $service;
    public $data;
    public $paypal = 'credit';

    protected $listeners = [
        'get_payment' => 'getPayment'
    ];

    protected array $rules = [
        'payment.address1'     => 'required',
        'payment.name_of_card' => 'required',
        'payment.credit_card'  => 'required',
        'payment.country'      => 'required',
        'payment.ex_month'     => 'required|numeric',
        'payment.ex_year'      => 'required|numeric',
        'payment.postal'       => 'required',
        'payment.cvd_code'     => 'required',
        'payment.city'         => 'required',
        'payment.province'     => 'required',
    ];

    public function mount() {
        if (PaymentInfo::where('user_id', auth()->user()->id)->where('default', '1')->exists()) {
            $this->payment = PaymentInfo::where('user_id', auth()->user()->id)->where('default', '1')->get()->toArray();
            $this->payment = array_shift($this->payment);
        }

        $this->service = Services::where('service_type', 'mailbox')->get()->first();
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function getPayment($params) {
        $this->data = $params;
//        $this->dispatchBrowserEvent('activity-detail', $params['scanning']['price']);
    }

    public function getLabel() {
        $this->validate();

        $paypal = new PaypalEnvironment();
        $result = $paypal->createNewOrder('CAD', $this->data['final_payable'], 'home.services.mailbox');

        $trak_num = new GenerateTrackingNumber();
        $tracking_number = $trak_num->generateBarcodeNumber('mailbox');
        try {
            $boxType = MailboxTypes::where('id', $this->data['mailbox_type_id'])->first();
            if ($boxType['expired_type'] === 'month') {
                $ren_date = Carbon::now()->addMonthsNoOverflow($boxType['expired_time']);
            } else if ($boxType['expired_type'] === 'year') {
                $ren_date = Carbon::now()->addMonthsNoOverflow($boxType['expired_time'] * 12);
            }

            $order = UserMailboxes::create([
                'tracking_code' => $tracking_number,
                'customer_1' => $this->data['customer_1'],
                'customer_2' => $this->data['customer_2'] ?? '',
                'customer_3' => $this->data['customer_3'] ?? '',
                'renewal_date' => $ren_date,
                'mailbox_type' => $this->data['mailbox_type'],
                'mailbox_type_id' => $this->data['mailbox_type_id'],
                'photo1' => $this->data['photo1'],
                'photo2' => $this->data['photo2'],
                'key_status' => $this->data['key'] ? 1 : 0,
                'user_id' => auth()->user()->id,
                'box_id' => $this->data['box_id'],
            ]);

            Temp::where('temp_file', $this->data['photo2'])->where('user_id', auth()->user()->id)->delete();
            Temp::where('temp_file', $this->data['photo1'])->where('user_id', auth()->user()->id)->delete();

            Transactions::create([
                'trans_code' => $result->id,
                'price' => $this->data['final_payable'],
                'percentage' => ($this->service['service_percentage'] / 100),
                'status' => 'pending',
                'payed_by' => 'paypal',
                'user_mailbox_id' => $order->id,
                'user_id' => auth()->user()->id,
                'agent_id' => $this->data['agent'],
            ]);
        } catch (\Exception $e) {
            dd($e);
        }

        foreach ($result->links as $link) {
            if ($link->rel === 'approve') {
                return redirect($link->href);
            }
        }
    }

    public function render()
    {
        $countries = Country::orderByRaw("FIELD(id,38,231) DESC")->get();
        return view('livewire.home.panel.services.mailbox-content.mailbox.payment', compact('countries'));
    }
}
