<?php

namespace App\Http\Livewire\Home\Panel\Services\PrintingContent\Printing;

use App\Http\Livewire\Admin\Agent\GenerateTrackingNumber;
use App\Http\Livewire\PaypalEnvironment;
use App\Models\Country;
use App\Models\OrderPrinting;
use App\Models\PaymentInfo;
use App\Models\Temp;
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

    public function getPayment($params) {
//        dd($params);
        $this->data = $params;
//        $this->dispatchBrowserEvent('activity-detail', $params['paper']['price']);
    }

    public function getLabel() {
        $this->validate();

        $paypal = new PaypalEnvironment();
        $result = $paypal->createNewOrder('CAD', $this->data['paper']['price'], 'home.services.printing');

        $trak_num = new GenerateTrackingNumber();
        $tracking_number = $trak_num->generateBarcodeNumber('printing');
        try {
            $order = OrderPrinting::create([
                'tracking_code' => $tracking_number,
                'paper_type' => $this->data['paper']['paper_type'],
                'color_type' => $this->data['paper']['paper_color'],
                'uploaded_file' => $this->data['paper']['photo'],
                'paper_count' => $this->data['paper']['paper_num'],
                'agent_id' => $this->data['agent']['id'],
                'user_id' => auth()->user()->id,
            ]);

            Temp::where('temp_file', $this->data['paper']['photo'])->where('user_id', auth()->user()->id)->delete();

            Transactions::create([
                'trans_code' => $result->id,
                'price' => $this->data['paper']['price'],
                'status' => 'pending',
                'payed_by' => 'paypal',
                'printing_id' => $order->id,
                'user_id' => auth()->user()->id,
                'agent_id' => $this->data['agent']['id'],
                'percentage' => $this->data['paper']['percentage'],
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
//        $this->data['transaction_id'] = $trans_id;
//        $this->emit('m_step', '2');
//        $this->emit('get_label', $this->data);
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function render()
    {
        $validated = $this->validated;
        $countries = Country::orderByRaw("FIELD(id,38,231) DESC")->get();
        return view('livewire.home.panel.services.printing-content.printing.payment', compact('validated', 'countries'));
    }
}
