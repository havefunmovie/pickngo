<?php

namespace App\Http\Livewire\Home\Panel\Services\ScanningContent\Scanning;

use App\Http\Livewire\Admin\Agent\GenerateTrackingNumber;
use App\Http\Livewire\PaypalEnvironment;
use App\Models\Country;
use App\Models\OrderScanning;
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
        $this->data = $params;
//        $this->dispatchBrowserEvent('activity-detail', $params['scanning']['price']);
    }

    public function getLabel() {
        $this->validate();

        $paypal = new PaypalEnvironment();
        $result = $paypal->createNewOrder('CAD', $this->data['scanning']['price'], 'home.services.scanning');

        $trak_num = new GenerateTrackingNumber();
        $tracking_number = $trak_num->generateBarcodeNumber('scanning');
        try {
            $order = OrderScanning::create([
                'tracking_code' => $tracking_number,
                'email' => $this->data['scanning']['email'],
                'paper_count' => $this->data['scanning']['count'],
                'agent_id' => $this->data['scanning']['agent'],
                'user_id' => auth()->user()->id,
            ]);

            Transactions::create([
                'trans_code' => $result->id,
                'price' => $this->data['scanning']['price'],
                'status' => 'pending',
                'payed_by' => 'paypal',
                'scanning_id' => $order->id,
                'user_id' => auth()->user()->id,
                'agent_id' => $this->data['scanning']['agent'],
                'percentage' => $this->data['scanning']['percentage'],
            ]);
        } catch (\Exception $e) {
            dd($e);
        }

        foreach ($result->links as $link) {
            if ($link->rel === 'approve') {
                return redirect($link->href);
            }
        }

//        $this->goNext('payed_manual');
    }

    public function goNext($trans_id) {

        $this->data['transaction_id'] = $trans_id;
        $this->emitUp('m_step', '3');
        $this->emitUp('get_label', $this->data);
    }

    public function render()
    {
        $validated = $this->validated;
        $countries = Country::orderByRaw("FIELD(id,38,231) DESC")->get();
        return view('livewire.home.panel.services.scanning-content.scanning.payment', compact('validated', 'countries'));
    }
}
