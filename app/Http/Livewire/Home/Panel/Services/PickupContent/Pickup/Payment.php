<?php

namespace App\Http\Livewire\Home\Panel\Services\PickupContent\Pickup;


use App\Http\Livewire\PaypalEnvironment;
use App\Models\AddressBook;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrderPackage;
use App\Models\PaymentInfo;
use App\Models\Transactions;
use Livewire\Component;


class Payment extends Component
{
    public $validated;

    public $payment;

    public $data;

    public $error;

    public $mServiceSummary;

    protected $listeners = [
        'get_payment' => 'getPaymentLabel',
        'go_next' => 'goNext'
    ];

    protected array $rules = [
        'payment.name_of_card' => 'required',
        'payment.address1'     => 'required',
        'payment.country'      => 'required',
        'payment.ex_month'     => 'required|numeric',
        'payment.ex_year'      => 'required|numeric',
        'payment.postal'       => 'required',
        'payment.cvd_code'     => 'required',
        'payment.city'         => 'required',
        'payment.province'     => 'required',
        'payment.credit_card'  => 'required|numeric',
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

    public function getPaymentLabel($params, $mServiceSummary) {
        $this->data = $params;
        $this->mServiceSummary = array_values($mServiceSummary);
//        $this->dispatchBrowserEvent('activity-detail', ltrim($mServiceSummary['negotiated_charge'], '$'));
    }

    public function getLabel() {
        $this->validate();
        $paypal = new PaypalEnvironment();
        $result = $paypal->createNewOrder('CAD', ltrim($this->mServiceSummary[0]['cost'], '$'), 'home.services.pickup-delivery');
        try {
            if ($this->data['from']['addressBook']) {
               $addressFrom = AddressBook::create([
                    'name' => $this->data['from']['company'],
                    'user_id' => auth()->user()->id,
                    'type' => 'from',
                    'country' => $this->data['from']['country'],
                    'province' => $this->data['from']['province'],
                    'city' => $this->data['from']['city'],
                    'line_1' => $this->data['from']['address1'],
                    'line_2' => ($this->data['from']['address2'] ?? ''),
                    'attention' => $this->data['from']['attention'],
                    'postal_code' => $this->data['from']['postal'],
                    'trans_type' => $this->data['from']['trans_type'],
                    'phone' => $this->data['from']['phone'],
                    'email' => $this->data['from']['email'],
                    'instruction' => $this->data['from']['instruction'],
                    'service_type' => 'parcel'
                ]);
            }

            if($this->data['from']['addressBook'])
                $from = $addressFrom->id;
            else
                $from ='';

            $to =$this->data['to']['id'];

            $order = Order::create([
                'user_id' => auth()->user()->id,
                'from_address_id' => $from,
                'to_address_id' => $to,
            ]);
            
            $orderDetails = OrderPackage::create([
                'order_id' => $order->id,
                'label' => 'pending',
                'status' => 'pending',
                'tracking_code' => $result->id,

                'service_type' => $this->mServiceSummary[0]['name'],
                'service_cost' => ltrim($this->mServiceSummary[0]['cost'], '$'),

                'weight' => $this->data['package']['weight'],
                'weight_type' => 'LBS',
                'length' => $this->data['package']['length'],
                'width' => $this->data['package']['width'],
                'height' => $this->data['package']['height'],
                'dimension_type' => 'INCH',

                'country_from' => $this->data['from']['country'],
                'province_from' => $this->data['from']['province'],
                'city_from' => $this->data['from']['city'],
                'name_from' => $this->data['from']['company'],
                'line_1_from' => $this->data['from']['address1'],
                'attention_from' => $this->data['from']['attention'],
                'instruction_from' => $this->data['from']['instruction'],
                'postal_code_from' => $this->data['from']['postal'],
                'trans_type_from' => $this->data['from']['trans_type'],
                'phone_from' => $this->data['from']['phone'],
                'email_from' => $this->data['from']['email'],

                'country_to' => $this->data['to']['country'],
                'province_to' => $this->data['to']['province'],
                'city_to' => $this->data['to']['city'],
                'name_to' => $this->data['to']['company'],
                'line_1_to' => $this->data['to']['address1'],
                'postal_code_to' => $this->data['to']['postal'],
                'phone_to' => $this->data['to']['phone'],
            ]);
            
            Transactions::create([
                'trans_code' => $result->id,
                'price' => ltrim($this->mServiceSummary[0]['cost'], '$'),
                'currency' => 'CAD',
                'status' => 'pending',
                'payed_by' => 'paypal',
                'puckup_delivery_id' => $order->id,
                'user_id' => auth()->user()->id,
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
//        if ($label = $this->createLabel()){
//            $this->mServiceSummary['transaction_id'] = $trans_id;
//            $this->emit('m_step', '3');
//            $this->emit('get_label',$this->data, $this->mServiceSummary, $label);
//        }
    }

    public function render()
    {
        $validated = $this->validated;
        $countries = Country::orderByRaw("FIELD(id,38,231) DESC")->get();
        return view('livewire.home.panel.services.pickup-content.pickup.payment', compact('countries', 'validated'));
    }
}
