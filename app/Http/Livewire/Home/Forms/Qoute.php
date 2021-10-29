<?php

namespace App\Http\Livewire\Home\Forms;

use App\Events\AgentReciveNewOrderFromInStoreUserEvent;
use App\Events\NewUserEvent;
use App\Models\OrderEnvelop;
use App\Models\OrderParcel;
use App\Models\Services;
use App\Models\Taxes;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Session;

class Qoute extends Component
{
    public $envelop;
    public $validated;
    public $rates;
    public $percentage;
    public $data;
    public $services;
    public $service;
    public $disabled = 'disabled';

    protected $listeners = [
        'get_quote',
    ];

    public function render()
    {
        return view('livewire.home.forms.qoute');
    }

    public function get_quote($data,$services) {
        $this->data = $data;
        $this->services = $services;
    }

    public function chooseService($service_code,$service_name,$total_charge)
    {
        $this->service['service_code'] = $service_code;
        $this->service['service_name'] = $service_name;
        $tax = Taxes::where('province' , $this->data['reciver']['reciver_province'])->pluck('tax')->toArray();
        $this->service['agent_service_percentage'] = Services::where('service_type', $this->data['package']['package_type'])->pluck('service_percentage')->first();
        $price = ltrim($total_charge, '$');
        $this->service['tax'] = round((($price * $tax[0]) - $price),2);
        $this->service['final_price'] = round(ltrim($total_charge, '$')* $tax[0],2);
        $this->disabled = '';
    }

    public function sendDataToAgent()
    {
        $this->data['service']=$this->service;
        if($this->data['customer']['new_customer'])
        {
            // create new user 
            $user = User::create([
                'agent_id' => $this->data['agent']['id'],
                'name' => $this->data['customer']['customer_name'],
                'family' => $this->data['customer']['customer_family'],
                'email' => $this->data['customer']['customer_email'],
                'mobile' => $this->data['customer']['customer_phone'],
                'password' => Hash::make('secret_password'),
                'address' => $this->data['customer']['customer_address'],
                'postal' => $this->data['customer']['customer_postalcode'],
                'city' => $this->data['customer']['customer_city'],
                'province' => $this->data['customer']['customer_province'],
            ]);
            Event(new NewUserEvent($user));
        }
        else{
            $user = User::where('id' , $this->data['customer']['customer_id'])->first();
        }

        if($this->data['package']['package_type'] == 'parcel')
        {
            $order = OrderParcel::create([
                'tracking_code' => '',
                'label' => 'pending',
                'user_id' => $user->id,
                'agent_id' => $this->data['agent']['id'],

                'service_code' => $this->data['service']['service_code'],
                'service_name' => $this->data['service']['service_name'],
                
                'country_to' => $this->data['reciver']['reciver_country'] ?? '',
                'province_to' => $this->data['reciver']['reciver_province'] ?? '',
                'city_to' => $this->data['reciver']['reciver_city'],
                'name_to' => $this->data['reciver']['reciver_name'],
                'line_1_to' => $this->data['reciver']['reciver_address'],
                'attention_to' => $this->data['reciver']['reciver_attention'] ?? '',
                'postal_code_to' => $this->data['reciver']['reciver_postalcode'],
                'trans_type_to' => $this->data['package']['description'],
                'phone_to' => $this->data['reciver']['reciver_phone'],
                'email_to' => $this->data['reciver']['reciver_email'] ?? '',

                'country_from' => $this->data['customer']['customer_country'] ?? '',
                'province_from' => $this->data['customer']['customer_province'] ?? '',
                'city_from' => $this->data['customer']['customer_city'],
                'name_from' => $this->data['customer']['customer_name'],
                'line_1_from' => $this->data['customer']['customer_address'],
                'attention_from' => $this->data['customer']['customer_attention'] ?? '',
                'postal_code_from' => $this->data['customer']['customer_postalcode'],
                'trans_type_from' => 'residential',
                'phone_from' => $this->data['customer']['customer_phone'] ?? '',
                'email_from' => $this->data['customer']['customer_email'] ?? '',

                'weight' => $this->data['package']['package_weight'],
                'weight_type' => $this->data['package']['weight_type'],
                'length' => $this->data['package']['package_length'],
                'width' => $this->data['package']['package_width'],
                'height' => $this->data['package']['package_height'],
                'dimen_type' => $this->data['package']['dimensions_type'],
                'desc_of_content' => $this->data['package']['package_description'],
                'unit' => $this->data['package']['package_unit'] ?? '',
                'value_of_content' => $this->data['package']['package_value'] ?? '',
                'breakable' => $this->data['package']['breakable'],
                'replaceable' => $this->data['package']['replaceable'],
                'signature' => $this->data['package']['signature'],
                'protection' => $this->data['package']['protection'],
            ]);
            $transaction = Transactions::create([
                'trans_code' => 'Pending',
                'price' => $this->data['service']['final_price'],
                'percentage' => $this->data['service']['agent_service_percentage'],
                'currency' => 'CAD',
                'status' => 'pending',
                'payed_by' => 'agent',
                'parcel_id' => $order->id,
                'user_id' => $user->id,
                'agent_id' => $this->data['agent']['id'],
            ]);
        } 
        elseif($this->data['package']['package_type'] == 'envelop')
        {
            $order = OrderEnvelop::create([
                'tracking_code' => 'pending',
                'label' => 'pending',
                'user_id' => $user->id,
                'agent_id' => $this->data['agent']['id'],

                'service_code' => $this->data['service']['service_code'],
                'service_name' => $this->data['service']['service_name'],
                
                'country_to' => $this->data['reciver']['reciver_country'] ?? '',
                'province_to' => $this->data['reciver']['reciver_province'] ?? '',
                'city_to' => $this->data['reciver']['reciver_city'],
                'name_to' => $this->data['reciver']['reciver_name'],
                'line_1_to' => $this->data['reciver']['reciver_address'],
                'attention_to' => $this->data['reciver']['reciver_attention'] ?? '',
                'postal_code_to' => $this->data['reciver']['reciver_postalcode'],
                'trans_type_to' => $this->data['package']['description'],
                'phone_to' => $this->data['reciver']['reciver_phone'],
                'email_to' => $this->data['reciver']['reciver_email'] ?? '',

                'country_from' => $this->data['customer']['customer_country'] ?? '',
                'province_from' => $this->data['customer']['customer_province'] ?? '',
                'city_from' => $this->data['customer']['customer_city'],
                'name_from' => $this->data['customer']['customer_name'],
                'line_1_from' => $this->data['customer']['customer_address'],
                'attention_from' => $this->data['customer']['customer_attention'] ?? '',
                'postal_code_from' => $this->data['customer']['customer_postalcode'],
                'trans_type_from' => 'residential',
                'phone_from' => $this->data['customer']['customer_phone'] ?? '',
                'email_from' => $this->data['customer']['customer_email'] ?? '',

                'weight' => $this->data['package']['package_weight'],
                'weight_type' => $this->data['package']['weight_type'],
                'length' => $this->data['package']['package_length'],
                'width' => $this->data['package']['package_width'],
                'height' => $this->data['package']['package_height'],
                'dimen_type' => $this->data['package']['dimensions_type'],
                'desc_of_content' => $this->data['package']['package_description'],
                'unit' => $this->data['package']['package_unit'] ?? '',
                'value_of_content' => $this->data['package']['package_value'] ?? '',
                'breakable' => $this->data['package']['breakable'],
                'replaceable' => $this->data['package']['replaceable'],
                'signature' => $this->data['package']['signature'],
                'protection' => $this->data['package']['protection'],
            ]);
            $transaction = Transactions::create([
                'trans_code' => 'Pending',
                'price' => $this->data['service']['final_price'],
                'percentage' => $this->data['service']['agent_service_percentage'],
                'currency' => 'CAD',
                'status' => 'pending',
                'payed_by' => 'agent',
                'envelop_id' => $order->id,
                'user_id' => $user->id,
                'agent_id' => $this->data['agent']['id'],
            ]);
        }  
            
        
        Event(new AgentReciveNewOrderFromInStoreUserEvent($order,$transaction,$this->data['package']['package_type'],$user,$this->data['agent']['id']));
        session()->flash('completed', true);
        return redirect('/forms');
    }
}