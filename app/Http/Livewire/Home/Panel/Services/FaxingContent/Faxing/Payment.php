<?php

namespace App\Http\Livewire\Home\Panel\Services\FaxingContent\Faxing;

use App\Http\Livewire\Admin\Agent\GenerateTrackingNumber;
use App\Http\Livewire\PaypalEnvironment;
use App\Models\Country;
use App\Models\OrderFaxing;
use App\Models\PaymentInfo;
use App\Models\Transactions;
use Livewire\Component;

class Payment extends Component
{
    public $validated;

    public $payment;

    public $data;
    public $paypal = 'credit';

    protected $listeners = [
        'get_payment' => 'getPayment',
        'go_next' => 'goNext'
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
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function getPayment($params) {
//        dd($params);
        $this->data = $params;
//        $this->dispatchBrowserEvent('activity-detail', $params['faxing']['price']);
    }

    public function getLabel() {
        $this->validate();

        $paypal = new PaypalEnvironment();
        $result = $paypal->createNewOrder('CAD', $this->data['faxing']['price'], 'home.services.faxing');

        $trak_num = new GenerateTrackingNumber();
        $tracking_number = $trak_num->generateBarcodeNumber('faxing');
        try {
            $order = OrderFaxing::create([
                'tracking_code' => $tracking_number,
                'phone' => $this->data['faxing']['number'],
                'paper_count' => $this->data['faxing']['count'],
                'agent_id' => $this->data['faxing']['agent'],
                'user_id' => auth()->user()->id,
            ]);

            Transactions::create([
                'trans_code' => $result->id,
                'price' => $this->data['faxing']['price'],
                'status' => 'pending',
                'payed_by' => 'paypal',
                'faxing_id' => $order->id,
                'user_id' => auth()->user()->id,
                'agent_id' => $this->data['faxing']['agent'],
                'percentage' => $this->data['faxing']['percentage'],
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

    public function goNext($trans_id) {
        $this->data['transaction_id'] = $trans_id;
        $this->emit('m_step', '3');
        $this->emit('get_label', $this->data);
    }

    public function render()
    {
        $validated = $this->validated;
        $countries = Country::orderByRaw("FIELD(id,38,231) DESC")->get();
        return view('livewire.home.panel.services.faxing-content.faxing.payment', compact('validated', 'countries'));
    }
}
