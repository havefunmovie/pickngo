<?php

namespace App\Http\Livewire\Home\Forms;

use App\Events\AgentReciveNewOrderFromInStoreUserEvent;
use App\Events\NewUserEvent;
use App\Models\AgentService;
use App\Models\OrderEnvelop;
use App\Models\OrderParcel;
use App\Models\Transactions;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Livewire\Component;
use Session;
use Ups\Entity\Address;
use Ups\Entity\DeliveryTimeInformation;
use Ups\Entity\Dimensions;
use Ups\Entity\Package;
use Ups\Entity\PackageWeight;
use Ups\Entity\PackagingType;
use Ups\Entity\PaymentInformation;
use Ups\Entity\RateInformation;
use Ups\Entity\Shipment;
use Ups\Entity\ShipmentTotalWeight;
use Ups\Entity\ShipTo;
use Ups\Entity\ShipFrom;
use Ups\Entity\UnitOfMeasurement;
use Ups\Rate;

class Index extends Component
{
    public $notification = [];
    public $step=1, $agent_code,$agent_name,$agent_family,$agent_address,$agent_city,$agent_province;
    public $data = [];
    public $services = [];
    
    public function render()
    {
        return view('livewire.home.forms.index');
    }

    public function mount(Request $request)
    {
        if(isset($_GET['code']))
        {
           if(User::where('agent_code' , $_GET['code'])->where('status',1)->count() > 0)
            {
                $this->agent_code = $_GET['code'];
                $this->setAgentCode();
                $this->step = 2;
            }
            else
            {
                $this->notification['class'] = 'alert-danger';
                $this->notification['message'] = '! Unfortunetly we could not find any agent with this code';
                $this->notification['subMessage'] = '- Please ask the code from agent and';
            }
        }
    }
    protected $listeners = [
        'setCustomerInfo',
        'setReciverInfo' => 'setReciverInfo',
        'setPackageInfo' => 'setPackageInfo',
        'setStep',
        'customerEditInfo' => 'customerEditInfo',
    ];

    public function setAgentCode()
    {
        if($this->agent_code)
        {
            if($this->data['agent'] = User::where('agent_code' , $this->agent_code)->where('status',1)->first())
            {
                $this->agent_name = $this->data['agent']->name;
                $this->agent_family = $this->data['agent']->family;
                $this->agent_address = $this->data['agent']->address;
                $this->agent_city = $this->data['agent']->city;
                $this->agent_province = $this->data['agent']->province;
                $this->notification = null;
                $this->step = 2;
            }
            else
            {
                $this->notification['class'] = 'alert-danger';
                $this->notification['message'] = '! Unfortunetly we could not find any agent with this code';
                $this->notification['subMessage'] = '- Dont wory just make sure about code and please try again';
            }
        }
        else
        {
            $this->notification['class'] = 'alert-danger';
            $this->notification['message'] = '! The code feild is required';
            $this->notification['subMessage'] = '- Please enter agent code and try again';
        }
    }

    public function setCustomerInfo($data)
    {
        $this->data['customer'] = $data;
    }
    
    public function customerEditInfo()
    {
        session()->flash('EditCustomer', $this->data['customer']);
        $this->step = 3;
    }

    public function setReciverInfo($data)
    {
        $this->notification['class'] = 'alert-warning';
        $this->notification['message'] = '! The reciver address can not be a same as your address';
        if($this->data['customer']['customer_postalcode'] != $data['reciver_postalcode'])
        {
            $this->data['reciver'] = $data;
            $this->notification = null;
            $this->step = 5;
        }
        else
        {
            $this->notification['class'] = 'alert-warning';
            $this->notification['message'] = '! The reciver address can not be a same as your address';
            $this->notification['subMessage'] = '- Please check address / postalcode ';
        }
    }

    public function reciverEditInfo()
    {
        session()->flash('EditReciver', $this->data['reciver']);
        $this->step = 4;

    }

    public function setPackageInfo($data)
    {
        $this->data['package'] = $data;
   

        /////////////////////////// this part added beacuse UPS API does not work. for getting api price just DELETE this part 
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

                'service_code' => 'undefined',
                'service_name' => 'undefined',
                
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
                'price' => '0',
                'percentage' => null,
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

                'service_code' => 'undefined',
                'service_name' => 'undefined',
                
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
                'price' => '0',
                'percentage' => null,
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
        /////////////////////////// this part added beacuse UPS API does not work. for getting api price just DELETE this part


        // // this part commented beacuse UPS API doese not work. for getting api price just uncomment this part
        // if($this->ratingPackage())
        //     $this->emit('get_quote',$this->data, $this->services);
        // else
        //     $this->emit('get_quote',$this->data, null);
    }

    public function packageEditInfo()
    {
        session()->flash('EditPackage', $this->data['package']);
        $this->step = 5;
    }
    
    public function setStep($step)
    {
        $this->step = $step;
    }

    public function ratingPackage()
    {
        $api_key = AgentService::with('agent')->get();
        $api_key = $api_key->where('agent.level', 'admin')->first();

        
        $shipment = new Shipment();
        
        // Set shipper
        $shipment->setDescription('1206 PTR');
        
        $shipper = $shipment->getShipper();
        $shipper->setName($this->data['customer']['customer_name']);
        $shipper->setShipperNumber('V3685E');
        $shipment->setShipper($shipper);
        
        // From address
        $address = new Address();
        $address->setAddressLine1($this->data['customer']['customer_address']);
        $address->setPostalCode($this->data['customer']['customer_postalcode']);
        $address->setCity($this->data['customer']['customer_city']);
        $address->setStateProvinceCode($this->data['customer']['customer_province'] ?? '');       // Required in US
        $address->setCountryCode($this->data['customer']['customer_country'] ?? '');
        $shipFrom = new ShipFrom();
        $shipFrom->setName($this->data['customer']['customer_name']);
        $shipFrom->setPhoneNumber($this->data['customer']['customer_phone']);
        $shipFrom->setEMailAddress($this->data['customer']['customer_email']);
        $shipFrom->setAddress($address);
        $shipment->setShipFrom($shipFrom);
        
        
        // To address
        $address = new Address();
        $address->setAddressLine1($this->data['reciver']['reciver_address']);
        $address->setPostalCode($this->data['reciver']['reciver_postalcode']);
        $address->setCity($this->data['reciver']['reciver_city']);
        $address->setStateProvinceCode($this->data['reciver']['reciver_province'] ?? '');       // Required in US
        $address->setCountryCode($this->data['reciver']['reciver_country'] ?? '');
        $shipTo = new ShipTo();
        $shipTo->setAddress($address);

        $shipTo->setCompanyName($this->data['reciver']['reciver_name']);
        $shipTo->setEMailAddress($this->data['reciver']['reciver_email']);
        $shipTo->setAttentionName($this->data['reciver']['reciver_name']);
        $shipTo->setPhoneNumber($this->data['reciver']['reciver_phone']);

        $shipment->setShipTo($shipTo);
        // Set payment information
        $shipment->setPaymentInformation(new PaymentInformation('prepaid', (object)array('AccountNumber' => $api_key['account_number'])));

        $shipmentTotalWeight = new ShipmentTotalWeight();
        $unitOfMeasurement = new UnitOfMeasurement();
        $unitOfMeasurement->setCode('LBS');
        $unitOfMeasurement->setDescription('Pounds');
        $shipmentTotalWeight->setUnitOfMeasurement($unitOfMeasurement);
        $shipmentTotalWeight->setWeight($this->data['package']['package_weight']);
        $shipment->setShipmentTotalWeight($shipmentTotalWeight);
        // Add Package
        $package = new Package();
        $package->getPackagingType()->setCode(PackagingType::PT_UPSLETTER);
        $package->getPackagingType()->setDescription('Package');

        $dimensions = new Dimensions();
        $dimensions->setHeight($this->data['package']['package_height']);
        $dimensions->setWidth($this->data['package']['package_width']);
        $dimensions->setLength($this->data['package']['package_length']);

        $unit = new UnitOfMeasurement;
        // $unit->setCode($this->data['package']['dimensions_type']);
        $unit->setCode('IN');

        $dimensions->setUnitOfMeasurement($unit);
        $package->setDimensions($dimensions);

        $packageWeight = new PackageWeight();
        $packageWeight->getUnitOfMeasurement()->setCode('LBS');
        $packageWeight->setWeight($this->data['package']['package_weight']);
        $package->setPackageWeight($packageWeight);
        // Add descriptions because it is a package
        $package->setDescription('International Goods');

        // Add this package
        $shipment->addPackage($package);

        $rate_info = new RateInformation();
        $rate_info->setNegotiatedRatesIndicator('1');
        $shipment->setRateInformation($rate_info);

        $timeInfo = new DeliveryTimeInformation();
        $timeInfo->setPackageBillType('03');
        $shipment->setDeliveryTimeInformation($timeInfo);
        
        // Get shipment info
        try {
            $api = new Rate($api_key['access_key'], $api_key['username'], $api_key['password']);
            $confirm = $api->shopRates($shipment);
            foreach ($confirm->RatedShipment as $item) 
            {
                $service['service_code'] = $item->Service->getCode();
                $service['service_name'] = $item->Service->getName();
                $service['tot_charge'] = '$' . $item->TotalCharges->MonetaryValue;
                $service['currency'] = $item->TotalCharges->CurrencyCode;
                $service['DeliveryTime'] = $item->ScheduledDeliveryTime;
                $service['days'] = (is_numeric($item->GuaranteedDaysToDelivery) ? $item->GuaranteedDaysToDelivery : '' );
                $service['negotiated_rates'] = (is_null($item->NegotiatedRates) ? '' : $item->NegotiatedRates );
                // $percentage = Services::where('service_type','envelop')->get()->first();
                // $service['agent_percentage'] = $percentage->service_percentage;
                array_push($this->services , $service);
            }
            return $this->services;
        } 
        catch (\Exception $e) {
            // dd($e);

            $this->errorLabel = $e->getMessage();
            return false;
        }
    }
}