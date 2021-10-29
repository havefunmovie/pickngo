<?php

namespace App\Http\Livewire\Home\Panel\Services\EnvelopContent\Envelop;

use Session;
use App\Models\AddressBook;
use App\Models\OrderEnvelop;
use App\Models\Services;
use App\Models\Taxes;
use Livewire\Component;
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
            if ($service['service_type'] === 'envelop_user') {
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
        $this->emit('loading_mode', false);
    }

    public function previewStep()
    {
        $this->open_from = $this->open_to = false;
        $this->show -= 1;
        $this->setReshipData();
        $this->emit('loading_mode', false);
    }

    public  function openFrom() {
        !$this->open_from ? $this->open_from = true : $this->open_from = false;
        if (isset($this->data['from']['is-ab'])) {
            $this->emit('set_from', $this->data['from']);
        }
    }

    public  function openTo() {
        !$this->open_to ? $this->open_to = true : $this->open_to = false;
        if (isset($this->data['to']['is-ab'])) {
            $this->emit('set_to', $this->data['to']);
        }
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
        $this->emit('loading_mode', false);
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
            $data = OrderEnvelop::where('id', session('reship'))->get()->first()->toArray();

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
            $package['country'] = $data['country_from'];
            $package['value_of_content'] = $data['value_of_content'];
            $package['unit'] = $data['unit'];
            $package['desc_of_content'] = $data['desc_of_content'];
            $package['insurance'] = $data['insurance'];

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
            session()->flash('unit', $package['unit']);
            session()->flash('country', $package['country']);
            session()->flash('value_of_content', $package['value_of_content']);
            session()->flash('desc_of_content', $package['desc_of_content']);
            session()->flash('insurance', $package['insurance']);
        }
        $address = AddressBook::where('user_id', auth()->user()->id)->get();
        $errorLabel = $this->errorLabel;
        return view('livewire.home.panel.services.envelop-content.envelop.details', compact('errorLabel', 'address'));
    }

    public function ratingPackage()
    {
        $from = $this->data['from'];
        $to   = $this->data['to'];
        $pack = $this->data['package'];

        $shipment = new Shipment();

        // Set shipper
        $shipment->setDescription('1206 PTR');

        $shipper = $shipment->getShipper();
        $shipper->setName($from['company']);
        $shipper->setShipperNumber('V3685E');
        $shipment->setShipper($shipper);

        // From address
        $address = new Address();
        $address->setAddressLine1($to['address1']);
        $address->setPostalCode($to['postal']);
        $address->setCity($to['city']);
        $address->setStateProvinceCode($to['province'] ?? '');       // Required in US
        $address->setCountryCode($to['country'] ?? '');
        $shipFrom = new ShipFrom();
        $shipFrom->setName($from['company']);
        $shipFrom->setAddress($address);
        $shipment->setShipFrom($shipFrom);

        // To address
        $address = new Address();
        $address->setAddressLine1($to['address1']);
        $address->setPostalCode($to['postal']);
        $address->setCity($to['city']);
        $address->setStateProvinceCode($to['province'] ?? '');       // Required in US
        $address->setCountryCode($to['country'] ?? '');
        $shipTo = new ShipTo();
        $shipTo->setAddress($address);
        $shipTo->setCompanyName($to['company']);
        $shipTo->setAttentionName($to['company']);

        $shipment->setShipTo($shipTo);

        // Set payment information
        $shipment->setPaymentInformation(new PaymentInformation('prepaid', (object)array('AccountNumber' => $this->api_key['account_number'])));

        // Set service
//        $service = new Service();
//        $service->setCode(Service::S_AIR_2DAY/*$code*/);
//        $service->setDescription($service->getName());
//        $shipment->setService($service);

        $shipmentTotalWeight = new ShipmentTotalWeight();
        $unitOfMeasurement = new UnitOfMeasurement();
        $unitOfMeasurement->setCode($pack['weight-type']);
        $unitOfMeasurement->setDescription('Pounds');
        $shipmentTotalWeight->setUnitOfMeasurement($unitOfMeasurement);
        $shipmentTotalWeight->setWeight($pack['weight']);
        $shipment->setShipmentTotalWeight($shipmentTotalWeight);

        // Add Package
        $package = new Package();
        $package->getPackagingType()->setCode(PackagingType::PT_UPSLETTER);
        $package->getPackagingType()->setDescription('Package');

        $dimensions = new Dimensions();
        $dimensions->setHeight($pack['height']);
        $dimensions->setWidth($pack['width']);
        $dimensions->setLength($pack['length']);

        $unit = new UnitOfMeasurement;
        $unit->setCode($pack['type']);

        $dimensions->setUnitOfMeasurement($unit);
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

            $api = new Rate($this->api_key['access_key'], $this->api_key['username'], $this->api_key['password']);

            $confirm = $api->shopRates($shipment);

//            dd($confirm);
            foreach ($confirm->RatedShipment as $item) {
//                dd($item->Service->getCode());
                $service['service_code'] = $item->Service->getCode();
                $service['service_name'] = $item->Service->getName();
                $service['tot_charge'] = '$' . $item->TotalCharges->MonetaryValue;
                $service['currency'] = $item->TotalCharges->CurrencyCode;
                $service['negotiated_charge'] = '$' . number_format((float)($item->TotalCharges->MonetaryValue) * ((100 - $this->service['service_percentage']) / 100), 2, '.', '');
                $service['days'] = (is_numeric($item->GuaranteedDaysToDelivery) ? $item->GuaranteedDaysToDelivery : '' );
                $service['negotiated_rates'] = (is_null($item->NegotiatedRates) ? '' : $item->NegotiatedRates );
                $percentage = Services::where('service_type','envelop')->get()->first();
                $service['agent_percentage'] = $percentage->service_percentage;

                array_push($this->mServiceSummary, $service);
            }

//            dd($this->mServiceSummary);

            return $confirm; // Confirm holds the digest you need to accept the result

        } catch (\Exception $e) {
//            dd($e);

            $this->errorLabel = $e->getMessage();
            return false;
        }
    }
}
