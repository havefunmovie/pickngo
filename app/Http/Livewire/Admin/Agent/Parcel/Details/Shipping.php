<?php

namespace App\Http\Livewire\Admin\Agent\Parcel\Details;

use App\Models\AddressBook;
use App\Models\OrderParcel;
use App\Models\AgentService;
use App\Models\Taxes;
use App\Models\User;
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
use Ups\Entity\ShipFrom;
use Ups\Entity\Shipment;
use Ups\Entity\ShipmentTotalWeight;
use Ups\Entity\ShipTo;
use Ups\Entity\UnitOfMeasurement;
use Ups\Rate;

class Shipping extends Component
{
    public $currentStep = 1, $api_key, $validateError;

    public $parcel, $mServiceSummary, $open_from, $open_to, $from;

    public $fromTrasnMode = 'residential';
    public $toTrasnMode = 'residential';
    public $service;
    public $address;

    protected $listeners = [
        'sh_next_step' => 'nextStep',
        'sh_preview_step' => 'previewStep'
    ];

    public function mount($services) {
        foreach ($services as $service) {
            if ($service['service_type'] === 'parcel') {
                $this->service = $service;
                break;
            }
        }
    }

    public function openFrom() {
        !$this->open_from ? $this->open_from = true : $this->open_from = false;
        if (isset($this->parcel['from']['is-ab'])) {
            $this->emit('set_from', $this->parcel['from']);
        }
    }

    public function openTo() {
        !$this->open_to ? $this->open_to = true : $this->open_to = false;
        if (isset($this->parcel['to']['is-ab'])) {
            $this->emit('set_to', $this->parcel['to']);
        }
    }

    public function previewStep()
    {
        $this->open_from = $this->open_to = false;
        $this->currentStep -= 1;
        $this->setReshipData();
    }

    public function setReshipData() {
        if (isset($this->parcel['from']['is-ab'])) {
            if ($this->parcel['from']['is-ab'] && $this->currentStep == 1) {
                $this->emit('set_from', $this->parcel['from']);
            }
        }
        if (isset($this->parcel['to']['is-ab'])) {
            if ($this->parcel['to']['is-ab'] && $this->currentStep == 2) {
                $this->emit('set_to', $this->parcel['to']);
            }
        }
    }

    public function nextStep($step, $param)
    {
        $this->open_from = $this->open_to = false;
        $this->currentStep += 1;
        $this->setReshipData();
        $this->parcel[$step] = $param;
        $this->validateError = false;
        if ($this->currentStep > 3) {
            $this->currentStep = 3;
            $this->parcel['from']['trans_type'] = $this->fromTrasnMode;
            $this->parcel['to']['trans_type'] = $this->toTrasnMode;

            $this->alaco();
        }
    }

    public function alaco() {
        if ($this->ratingPackage($this->parcel)) {
            $this->parcel = $this->ratingPackage($this->parcel);
            $this->emit('next_step');
            $this->emit('create_quote',$this->parcel);
//            dd($this->parcel);
        } else{
            $this->currentStep = 1;
            $this->setReshipData();
            $this->emit('validate_error', $this->validateError);
        }
    }

    public function render()
    {
        if(Session::has('to-ba')) {
            $this->currentStep = 3;
            $this->parcel['to'] = AddressBook::where('id', session('to-ba'))->get()->first()->toArray();
            $to['to-company'] = $this->parcel['to']['name'];
            $to['to-address1'] = $this->parcel['to']['line_1'];
            $to['to-country'] = $this->parcel['to']['country'];
            $to['to-postal'] = $this->parcel['to']['postal_code'];
            $to['to-city'] = $this->parcel['to']['city'];
            $to['to-province'] = $this->parcel['to']['province'];
            $to['to-attention'] = $this->parcel['to']['attention'];
            $to['to-phone'] = $this->parcel['to']['phone'];
            $to['to-email'] = $this->parcel['to']['email'];
            $to['to-instruction'] = $this->parcel['to']['instruction'];
            $to['addressBook'] = false;
            $to['is-ab'] = true;
            $this->parcel['to'] = $to;
            $this->parcel['from'] = AddressBook::where('id', session('from-ba'))->get()->first()->toArray();
            $from['user_id']=0;
            $from['from-company'] = $this->parcel['from']['name'];
            $from['from-address1'] = $this->parcel['from']['line_1'];
            $from['from-country'] = $this->parcel['from']['country'];
            $from['from-postal'] = $this->parcel['from']['postal_code'];
            $from['from-city'] = $this->parcel['from']['city'];
            $from['from-province'] = $this->parcel['from']['province'];
            $from['from-attention'] = $this->parcel['from']['attention'];
            $from['from-phone'] = $this->parcel['from']['phone'];
            $from['from-email'] = $this->parcel['from']['email'];
            $from['from-instruction'] = $this->parcel['from']['instruction'];
            $from['addressBook'] = false;
            $from['is-ab'] = true;
            $this->parcel['from'] = $from;
//            dd($this->parcel);
        } 
        // Agent reship order
        else if (Session::has('reship')) {
            $data = OrderParcel::where('id', session('reship'))->get()->first()->toArray();

            $to['to-country'] = $data['country_to'];
            $to['to-province'] = $data['province_to'];
            $to['to-city'] = $data['city_to'];
            $to['to-company'] = $data['name_to'];
            $to['to-address1'] = $data['line_1_to'];
            $to['to-attention'] = $data['attention_to'];
            $to['to-postal'] = $data['postal_code_to'];
            $to['to-phone'] = $data['phone_to'];
            $to['to-email'] = $data['email_to'];
            $to['to-instruction'] = $data['instruction_to'];
            $to['trans_type'] = $data['trans_type_to'];
            $to['addressBook'] = false;
            $to['is-ab'] = true;

            $from['user_id']=$data['user_id'];
            $from['from-country'] = $data['country_from'];
            $from['from-province'] = $data['province_from'];
            $from['from-city'] = $data['city_from'];
            $from['from-company'] = $data['name_from'];
            $from['from-address1'] = $data['line_1_from'];
            $from['from-attention'] = $data['attention_from'];
            $from['from-postal'] = $data['postal_code_from'];
            $from['from-phone'] = $data['phone_from'];
            $from['from-email'] = $data['email_from'];
            $from['from-instruction'] = $data['instruction_from'];
            $from['trans_type'] = $data['trans_type_from'];
            $from['addressBook'] = false;
            $from['is-ab'] = true;

            $package['weight'] = $data['weight'];
            $package['weight-type'] = $data['weight_type'];
            $package['length'] = $data['length'];
            $package['width'] = $data['width'];
            $package['height'] = $data['height'];
            $package['dimen-type'] = $data['dimen_type'];

            $data = [];
            $data['to'] = $to;
            $data['from'] = $from;
            $data['package'] = $package;
            $this->parcel = $data;
            $this->currentStep = 3;

            session()->flash('weight', $package['weight']);
            session()->flash('weight-type', $package['weight-type']);
            session()->flash('length', $package['length']);
            session()->flash('width', $package['width']);
            session()->flash('height', $package['height']);
            session()->flash('dimen-type', $package['dimen-type']);
        }
        // Agent use existing user Information
        else if (Session::has('newParcelForExistingUser')) {
            $data = User::where('id', session('newParcelForExistingUser'))->get()->first()->toArray();
            $from['user_id'] = session('newParcelForExistingUser');
            $from['from-country'] = 'CA';
            $from['from-province'] = $data['province'];
            $from['from-city'] = $data['city'];
            $from['from-company'] = $data['name']." ".$data['family'];
            $from['from-address1'] = $data['address'];
            $from['from-attention'] = 'new attention';
            $from['from-postal'] = $data['postal'];
            $from['from-phone'] = $data['mobile'];
            $from['from-email'] = $data['email'];
            $from['from-instruction'] = 'test';
            $from['trans_type'] = 'resedential';
            $from['addressBook'] = false;
            $from['is-ab'] = true;
            
            $data = [];
            $data['from'] = $from;
            $this->parcel = $data;
            $this->currentStep = 1;
            $this->address = AddressBook::where('user_id', session('newParcelForExistingUser'))->get();
            $this->from = $from; 
        }
        return view('livewire.admin.agent.parcel.details.shipping', compact($this->address));
    }

    public function ratingPackage($parcel)
    {
        if (AgentService::where('agent_id', auth()->user()->id)->exists()) {
            $this->api_key = AgentService::where('agent_id', auth()->user()->id)->first()->toArray();
        } else {
            $this->validateError = "You dont set any API Access key yet!";
            return false;
        }

        $from = $parcel['from'];
        $to = $parcel['to'];
        $pack = $parcel['package'];
        $shipment = new Shipment();

        // Set shipper
        $shipment->setDescription('1206 PTR');

        $shipper = $shipment->getShipper();
        $shipper->setName($from['from-company']);
        $shipper->setShipperNumber('V3685E');
        $shipment->setShipper($shipper);

        // From address
        $address = new Address();
        $address->setAddressLine1($from['from-address1']);
        $address->setPostalCode($from['from-postal']);
        $address->setCity($from['from-city']);
        $address->setStateProvinceCode($from['from-province']);       // Required in US
        $address->setCountryCode($from['from-country']);
        $shipFrom = new ShipFrom();
        $shipFrom->setName($from['from-company']);
        $shipFrom->setAddress($address);
        $shipment->setShipFrom($shipFrom);

        // To address
        $address = new Address();
        $address->setAddressLine1($to['to-address1']);
        $address->setPostalCode($to['to-postal']);
        $address->setCity($to['to-city']);
        $address->setStateProvinceCode($to['to-province']);       // Required in US
        $address->setCountryCode($to['to-country']);
        $shipTo = new ShipTo();
        $shipTo->setAddress($address);
        $shipTo->setCompanyName($to['to-company']);
        $shipTo->setAttentionName($to['to-company']);

        $shipment->setShipTo($shipTo);

        // Set payment information
        $shipment->setPaymentInformation(new PaymentInformation('prepaid', (object)array('AccountNumber' => 'V3685E')));

        $shipmentTotalWeight = new ShipmentTotalWeight();
        $unitOfMeasurement = new UnitOfMeasurement();
        $unitOfMeasurement->setCode($pack['weight-type']);
        $unitOfMeasurement->setDescription('Pounds');
        $shipmentTotalWeight->setUnitOfMeasurement($unitOfMeasurement);
        $shipmentTotalWeight->setWeight($pack['weight']);
        $shipment->setShipmentTotalWeight($shipmentTotalWeight);

        // Add Package
        $package = new Package();
        $package->getPackagingType()->setCode(PackagingType::PT_PACKAGE);
        $package->getPackagingType()->setDescription('Package');
        $dimensions = new Dimensions();
        $dimensions->getUnitOfMeasurement()->setCode($pack['dimen-type']);
        $dimensions->setHeight($pack['height'])->setLength($pack['length'])->setWidth($pack['width']);
        $package->setDimensions($dimensions);
        $packageWeight = new PackageWeight();
        $packageWeight->getUnitOfMeasurement()->setCode($pack['weight-type']);
        $packageWeight->setWeight($pack['weight']);
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
            $api = new Rate($this->api_key['access_key'], $this->api_key['username'], $this->api_key['password']/*'CD97722D88D5ECD5', 'TUPSS370', 'H7v2v2845'*/);
            $confirm = $api->shopRates($shipment);
            $this->mServiceSummary = [];
            foreach ($confirm->RatedShipment as $item) {
                $service['service_code'] = $item->Service->getCode();
                $service['service_name'] = $item->Service->getName();
                $service['tot_charge'] = '$' . $item->TotalCharges->MonetaryValue;
                $service['currency'] = $item->TotalCharges->CurrencyCode;
                $service['percentage'] = ($this->service['service_percentage']);
                $tax = Taxes::where('province' , auth()->user()->province)->get()->first();
                $service['tax']= $tax->tax;
//                $service['negotiated_charge'] = '$' . number_format((float)($item->TotalCharges->MonetaryValue) * (($this->service['service_percentage']) / 100), 2, '.', '');
                $service['days'] = (is_numeric($item->GuaranteedDaysToDelivery) ? $item->GuaranteedDaysToDelivery : '' );
                $service['negotiated_rates'] = (is_null($item->NegotiatedRates) ? '' : $item->NegotiatedRates );
                array_push($this->mServiceSummary, $service);
            }
            $parcel['services'] = $this->mServiceSummary;

//            dd($parcel['services']);

            return $parcel; // Confirm holds the digest you need to accept the result

        } catch (\Exception $e) {
            $this->validateError = $e->getMessage();
            return false;
        }
    }
}
