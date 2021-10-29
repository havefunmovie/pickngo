<?php

namespace App\Http\Livewire\Home\Panel\Services\PickupContent\Pickup;

use Session;
use App\Models\AddressBook;
use App\Models\OrderPackage;
use App\Models\Services;
use Livewire\Component;


class ServicesDetails extends Component
{
    public $show = 1, $service, $api_key, $open_from, $open_to;

    public $data;

    public $fromTrasnMode = 'residential';
    public $toTrasnMode = 'residential';

    public $mServiceSummary = [];

    public $label = false;

    protected $errorLabel = false;

    protected $listeners = [
        'next_step' => 'nextStep',
        'preview_step' => 'previewStep',
        'first_step' => 'firstStep'
    ];

    public function mount($services, $apiKey) {
        $this->api_key = $apiKey;
        foreach ($services as $service) {
            if ($service['service_type'] === 'user') {
                $this->service = $service;
                break;
            }
        }
    }

    public function firstStep($data)
    {
        $this->show = 1;
        $this->data = $data;
        $this->emit('edit_from', $data['from']);
        $this->emit('edit_to', $data['to']);
        $this->emit('edit_pack', $data['package']);
    }

    public function previewStep()
    {
        $this->open_from = $this->open_to = false;
        $this->show -= 1;
        $this->setReshipData();
    }

    public  function openFrom() {
        !$this->open_from ? $this->open_from = true : $this->open_from = false;
    }

    public  function openTo() {
        !$this->open_to ? $this->open_to = true : $this->open_to = false;
    }

    public function setReshipData() {
        if (isset($this->data['from']['is-ab'])) {
            if ($this->data['from']['is-ab'] && $this->show == 1) {
                $this->emit('set_from', $this->data['from']);
            }
        }
        if (isset($this->data['to']['is-ab'])) {
            if ($this->data['to']['is-ab'] && $this->show == 2) {
                $this->emit('set_to', $this->data['to']);
            }
        }
    }

    public function nextStep($step,$params)
    {
        $this->open_from = $this->open_to = false;
        $this->data[$step]= $params;
        $this->show += 1;
        $this->setReshipData();
        if ($this->show > 3){
            $this->show = 3;
            $this->data['from']['trans_type'] = $this->fromTrasnMode;
            $this->data['to']['trans_type'] = $this->toTrasnMode;

            $this->alaco();
        }
    }

    public function alaco() {
        if ($this->ratingPackage()) {
            $this->emit('m_step', '1');
            $this->emit('get_quote',$this->data, $this->mServiceSummary);
        } else{
            $this->show = 1;
            $this->setReshipData();
        }
    }

    public function render()
    {
        if(Session::has('to-ba')) {
            $this->show = 3;
            $data['to'] = AddressBook::where('id', session('to-ba'))->get()->first()->toArray();
            $to['country'] = $data['to']['country'];
            $to['province'] = $data['to']['province'];
            $to['city'] = $data['to']['city'];
            $to['company'] = $data['to']['name'];
            $to['address1'] = $data['to']['line_1'];
            $to['attention'] = $data['to']['attention'];
            $to['postal'] = $data['to']['postal_code'];
            $to['phone'] = $data['to']['phone'];
            $to['email'] = $data['to']['email'];
            $to['instruction'] = $data['to']['instruction'];
            $to['addressBook'] = false;
            $to['is-ab'] = true;
            $this->data['to'] = $to;
            $data['from'] = AddressBook::where('id', session('from-ba'))->get()->first()->toArray();
            $from['country'] = $data['from']['country'];
            $from['province'] = $data['from']['province'];
            $from['city'] = $data['from']['city'];
            $from['company'] = $data['from']['name'];
            $from['address1'] = $data['from']['line_1'];
            $from['attention'] = $data['from']['attention'];
            $from['postal'] = $data['from']['postal_code'];
            $from['phone'] = $data['from']['phone'];
            $from['email'] = $data['from']['email'];
            $from['instruction'] = $data['from']['instruction'];
            $from['addressBook'] = false;
            $from['is-ab'] = true;
            $this->data['from'] = $from;
        } else if (Session::has('reship')) {
            $data = OrderPackage::where('order_id', session('reship'))->get()->first()->toArray();

            $to['country'] = $data['country_to'];
            $to['province'] = $data['province_to'];
            $to['city'] = $data['city_to'];
            $to['company'] = $data['name_to'];
            $to['address1'] = $data['line_1_to'];
            $to['attention'] = $data['attention_to'];
            $to['postal'] = $data['postal_code_to'];
            $to['phone'] = $data['phone_to'];
            $to['email'] = $data['email_to'];
            $to['instruction'] = $data['instruction_to'];
            $to['trans_type'] = $data['trans_type_to'];
            $to['addressBook'] = false;
            $to['is-ab'] = true;

            $from['country'] = $data['country_from'];
            $from['province'] = $data['province_from'];
            $from['city'] = $data['city_from'];
            $from['company'] = $data['name_from'];
            $from['address1'] = $data['line_1_from'];
            $from['attention'] = $data['attention_from'];
            $from['postal'] = $data['postal_code_from'];
            $from['phone'] = $data['phone_from'];
            $from['email'] = $data['email_from'];
            $from['instruction'] = $data['instruction_from'];
            $from['trans_type'] = $data['trans_type_from'];
            $from['addressBook'] = false;
            $from['is-ab'] = true;

            $package['weight'] = $data['weight'];
            $package['weight-type'] = $data['weight_type'];
            $package['length'] = $data['length'];
            $package['width'] = $data['width'];
            $package['height'] = $data['height'];
            $package['type'] = $data['dimen_type'];

            $data = [];
            $data['to'] = $to;
            $data['from'] = $from;
            $data['package'] = $package;
            $this->data = $data;
            $this->show = 3;

            session()->flash('weight', $package['weight']);
            session()->flash('weight-type', $package['weight-type']);
            session()->flash('length', $package['length']);
            session()->flash('width', $package['width']);
            session()->flash('height', $package['height']);
            session()->flash('type', $package['type']);
        }
        $errorLabel = $this->errorLabel;
        $address = AddressBook::where('user_id', auth()->user()->id)->get();
        return view('livewire.home.panel.services.pickup-content.pickup.details',compact('errorLabel', 'address'));
    }

    public function ratingPackage()
    {
        $from = $this->data['from'];
        $to   = $this->data['to'];
        $pack = $this->data['package'];
        $pack['weight-type'] = 'LBS';
        $pack['type'] = 'INCH';

        $addressFrom = $from['address1'].', '.$from['city'].', '.$from['province'].', '.$from['country'].', '.$from['postal'];
        $addressTo   = $to['address1'].', '.$to['city'].', '.$to['province'].', '.$to['country'].', '.$to['postal'];
       
        // Get distance in km
        $distance = $this->calculateDistance($addressFrom, $addressTo);

        $service= Services::where('service_type', 'pickup And Delivery')->firstOrFail();
        if($pack['weight'] <= $service->weight_minimum)
        {
            $weight_price = null;
            $extra_weight = null;
        }
        else
        {
            $extra_weight = $pack['weight'] - $service->weight_minimum;
            $weight_price = (ceil($extra_weight / $service->weight_extra)) * $service->weight_extra_price;
        }
            
        if($pack['height'] <= $service->dimensions_minimum && $pack['width'] <= $service->dimensions_minimum && $pack['length'] <= $service->dimensions_minimum)
            $dimensions_price = null;
        else
        {
            $extra = max(0 , ($pack['height'] - $service->dimensions_minimum)) + max(0 , ($pack['width'] - $service->dimensions_minimum)) + max(0 , ($pack['length'] - $service->dimensions_minimum));
            $dimensions_price = (ceil($extra / $service->dimensions_extra)) * $service->dimensions_extra_price;
        }
        if($distance <= $service->distance_minimum)
        {
            $distance_price = null;
            $extra_distance = null;
        }
        else
        {
            $extra_distance = $distance - $service->distance_minimum;
            $distance_price = (ceil($extra_distance / $service->distance_extra)) * $service->distance_extra_price;
        }

        $regularCost = ($weight_price + $dimensions_price + $distance_price + $service->service_price);
        $urgentCost = ($weight_price + $dimensions_price + $distance_price + $service->urgent_price);

       return $this->mServiceSummary = [
            [
                'name' => 'Regular',
                'cost' => $regularCost,
                'service_details' =>[
                    'weight' => $service->weight_minimum,
                    'distance' => $service->distance_minimum,
                ],
                'order_extras' => [
                    'weight' => $extra_weight,
                    'distance' => $extra_distance,
                ],
            ],
            [
                'name' => 'Express',
                'cost' => $urgentCost,
                'service_details' =>[
                    'weight' => $service->weight_minimum,
                    'distance' => $service->distance_minimum,
                ],
                'order_extras' => [
                    'weight' => $extra_weight,
                    'distance' => $extra_distance,
                ],
            ],
        ];
    }

    public function calculateDistance($addressFrom, $addressTo)
    {
        $apiKey = 'AIzaSyDYra2vRvL5bFa0bRNcMhjiXa7eWNA0_o0';
        $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
        $formattedAddrTo     = str_replace(' ', '+', $addressTo);
        // Geocoding API request with start address

        $Api = json_decode(file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$formattedAddrFrom.'&destinations='.$formattedAddrTo.'&mode=driving&language=en&key='.$apiKey));
        return substr($Api->rows['0']->elements['0']->distance->text,0,-3);
       
    }
}
