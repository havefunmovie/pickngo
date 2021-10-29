<?php

namespace App\Http\Livewire\Home\Panel\Services\EnvelopContent\Envelop;

use App\Http\Livewire\PaypalEnvironment;
use App\Models\AddressBook;
use App\Models\Country;
use App\Models\OrderEnvelop;
use App\Models\PaymentInfo;
use App\Models\Transactions;
use Livewire\Component;


class Payment extends Component
{
    public $validated, $payment, $data, $mServiceSummary, $error;
    public $paypal = 'credit';

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
        'payment.credit_card'  => 'required',
    ];

    public function mount() {
        if (PaymentInfo::where('user_id', auth()->user()->id)->where('default', '1')->exists()) {
            $this->payment = PaymentInfo::where('user_id', auth()->user()->id)->where('default', '1')->get()->first()->toArray();
        }
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function getPaymentLabel($params, $mServiceSummary) {
        $this->data = $params;
        $this->mServiceSummary = $mServiceSummary;
//        $this->dispatchBrowserEvent('activity-detail', ['price' => ltrim($mServiceSummary['negotiated_charge'], '$'), 'currency' => $mServiceSummary['negotiated_charge']]);
    }

    public function getLabel() {
        $this->validate();
        $paypal = new PaypalEnvironment();
        $result = $paypal->createNewOrder($this->mServiceSummary['currency'], round(ltrim($this->mServiceSummary['negotiated_charge'], '$'),2) , 'home.services.envelop');

        try {
            $order = OrderEnvelop::create([
                'tracking_code' => $result->id,
                'label' => 'pending',
                'user_id' => auth()->user()->id,
                'weight' => $this->data['package']['weight'],
                'weight_type' => $this->data['package']['weight-type'],
                'length' => $this->data['package']['length'],
                'width' => $this->data['package']['width'],
                'height' => $this->data['package']['height'],
                'dimen_type' => $this->data['package']['type'],
                'service_code' => $this->mServiceSummary['service_code'],
                'service_name' => $this->mServiceSummary['service_name'],
                'country_to' => $this->data['to']['country'] ?? '',
                'province_to' => $this->data['to']['province'] ?? '',
                'city_to' => $this->data['to']['city'],
                'name_to' => $this->data['to']['company'],
                'line_1_to' => $this->data['to']['address1'],
                'line_2_to' => $this->data['to']['address2'] ?? '',
                'attention_to' => $this->data['to']['attention'],
                'postal_code_to' => $this->data['to']['postal'],
                'trans_type_to' => $this->data['to']['trans_type'],
                'phone_to' => $this->data['to']['phone'],
                'email_to' => $this->data['to']['email'] ?? '',
                'instruction_to' => $this->data['to']['instruction'] ?? '',
                'country_from' => $this->data['from']['country'] ?? '',
                'province_from' => $this->data['from']['province'] ?? '',
                'city_from' => $this->data['from']['city'],
                'name_from' => $this->data['from']['company'],
                'line_1_from' => $this->data['from']['address1'],
                'line_2_from' => $this->data['from']['address2'] ?? '',
                'attention_from' => $this->data['from']['attention'],
                'postal_code_from' => $this->data['from']['postal'],
                'trans_type_from' => $this->data['from']['trans_type'],
                'phone_from' => $this->data['from']['phone'],
                'email_from' => $this->data['from']['email'] ?? '',
                'instruction_from' => $this->data['from']['instruction'] ?? '',
                'desc_of_content' => $this->data['package']['desc_of_content'],
                'unit' => $this->data['package']['unit'] ?? '',
                'value_of_content' => $this->data['package']['value_of_content'] ?? '',
                'insurance' => $this->data['package']['insurance'] ?? '',
            ]);
            
            Transactions::create([
                'trans_code' => $result->id,
                'price' => round(ltrim($this->mServiceSummary['negotiated_charge'], '$'),2),
                'currency' => $this->mServiceSummary['currency'],
                'percentage' => $this->mServiceSummary['agent_percentage'],
                'status' => 'pending',
                'payed_by' => 'paypal',
                'envelop_id' => $order->id,
                'user_id' => auth()->user()->id,
            ]);

            if ($this->data['to']['addressBook']) {
                AddressBook::create([
                    'name' => $this->data['to']['company'],
                    'user_id' => auth()->user()->id,
                    'type' => 'to',
                    'country' => $this->data['to']['country'] ?? '',
                    'province' => $this->data['to']['province'] ?? '',
                    'city' => $this->data['to']['city'],
                    'line_1' => $this->data['to']['address1'],
                    'line_2' => ($this->data['to']['address2'] ?? ''),
                    'attention' => $this->data['to']['attention'],
                    'postal_code' => $this->data['to']['postal'],
                    'trans_type' => $this->data['to']['trans_type'],
                    'phone' => $this->data['to']['phone'],
                    'email' => $this->data['to']['email'] ?? '',
                    'instruction' => $this->data['to']['instruction'] ?? '',
                    'service_type' => 'envelop'
                ]);
            }
            if ($this->data['from']['addressBook']) {
                AddressBook::create([
                    'name' => $this->data['from']['company'],
                    'user_id' => auth()->user()->id,
                    'type' => 'from',
                    'country' => $this->data['from']['country'] ?? '',
                    'province' => $this->data['from']['province'] ?? '',
                    'city' => $this->data['from']['city'],
                    'line_1' => $this->data['from']['address1'],
                    'line_2' => ($this->data['from']['address2'] ?? ''),
                    'attention' => $this->data['from']['attention'],
                    'postal_code' => $this->data['from']['postal'],
                    'trans_type' => $this->data['from']['trans_type'],
                    'phone' => $this->data['from']['phone'],
                    'email' => $this->data['from']['email'] ?? '',
                    'instruction' => $this->data['from']['instruction'] ?? '',
                    'service_type' => 'envelop'
                ]);
            }
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
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
        return view('livewire.home.panel.services.envelop-content.envelop.payment', compact('validated', 'countries'));
    }
}
