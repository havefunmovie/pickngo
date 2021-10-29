<?php

namespace App\Http\Livewire\Admin\Agent\Envelop\Details;

use App\Models\AgentService;
use Livewire\Component;
use Ups\Entity\Address;
use Ups\Entity\InvoiceLineTotal;
use Ups\Entity\Package;
use Ups\Entity\PackagingType;
use Ups\Entity\PaymentInformation;
use Ups\Entity\RateInformation;
use Ups\Entity\ReferenceNumber;
use Ups\Entity\ReturnService;
use Ups\Entity\Service;
use Ups\Entity\ShipFrom;
use Ups\Entity\Shipment;
use Ups\Entity\Shipper;
use Ups\Entity\ShipTo;
use Ups\Entity\UnitOfMeasurement;
use Ups\Shipping;

class GetQuote extends Component
{
    public $data, $validateError, $api_key, $desired_object, $returnAmount,$paidAmount,$total_price;

    protected $listeners = [
        'get_quote' => 'getQuote'
    ];

    public function getQuote($data) {
        $this->data = $data;
    }

    public function prev() {
        $this->emit('preview_step');
    }

    public function selectService($code) {
        $desired_object = array_filter($this->data['services'], function($item) use ($code) {
            return $item['service_code'] == $code;
        });
        $this->desired_object = array_shift($desired_object);
        $this->total_price = round(ltrim($this->desired_object['tot_charge'], '$') * $this->desired_object['tax'] ,2);
    }

    public function payedBy($payedBy)
    {
        $this->data['payedBy'] = $payedBy;
        if ($label = $this->createLabel($this->desired_object)){
            $this->emit('next_step');
            $this->emit('get_label',$this->data, $this->desired_object, $label);
        }
    }

    public function calculate()
    {
        if(ltrim($this->desired_object['tot_charge'], '$') * $this->desired_object['tax'] <= $this->paidAmount)
            $this->returnAmount = round(abs((ltrim($this->desired_object['tot_charge'], '$') * $this->desired_object['tax']) - $this->paidAmount),2);
        else
            $this->returnAmount = 'Amount should be equal or greater than service price';
    }

    public function createLabel($desired_object)
    {
        $this->api_key = AgentService::where('agent_id', auth()->user()->id)->first()->toArray();
        $service_code = null;
        // Start shipment
        $shipment = new Shipment;

//        foreach ($this->mServiceSummary as $row) {
        $service_code = $desired_object['service_code'];
//        }

        try {
            // Set shipper
            $shipment->setDescription('1206 PTR');

            $shipper = $shipment->getShipper();
            $address = new Address();
            if ($this->data['from']['from-country'] === 'CA') {
                $shipper->setName($this->data['from']['from-company']);
                $shipper->setAttentionName($this->data['from']['from-attention']);
                $shipper->setPhoneNumber($this->data['from']['from-phone']);
                $address->setAddressLine1($this->data['from']['from-address1']);
                $address->setCity($this->data['from']['from-city']);
                $address->setPostalCode($this->data['from']['from-postal']);
                $address->setStateProvinceCode($this->data['from']['from-province']);
                $address->setCountryCode($this->data['from']['from-country']);
            } else {
                $shipper->setName($this->data['to']['to-company']);
                $shipper->setAttentionName($this->data['to']['to-attention']);
                $shipper->setPhoneNumber($this->data['to']['to-phone']);
                $address->setAddressLine1($this->data['to']['to-address1']);
                $address->setCity($this->data['to']['to-city']);
                $address->setPostalCode($this->data['to']['to-postal']);
                $address->setStateProvinceCode($this->data['to']['to-province']);
                $address->setCountryCode($this->data['to']['to-country']);
            }
            $shipper->setShipperNumber($this->api_key['account_number']);
            $shipper->setAddress($address);
            $shipment->setShipper($shipper);

            $shipperAddress = new Address();
            $shipperAddress->setAddressLine1($this->data['from']['from-address1']);
            $shipperAddress->setCity($this->data['from']['from-city']);
            $shipperAddress->setStateProvinceCode($this->data['from']['from-province']);
            $shipperAddress->setPostalCode($this->data['from']['from-postal']);
            $shipperAddress->setCountryCode($this->data['from']['from-country']);

            $shipFrom = new ShipFrom();
            $shipFrom->setAddress($shipperAddress);
            $shipFrom->setCompanyName($this->data['from']['from-company']);
            $shipFrom->setAttentionName($this->data['from']['from-attention']);
            $shipFrom->setPhoneNumber($this->data['from']['from-phone']);
//            dd($this->data);
            $shipment->setShipFrom($shipFrom);

            // To address
            $address = new Address();
            $address->setAddressLine1($this->data['to']['to-address1']);
            $address->setPostalCode($this->data['to']['to-postal']);
            $address->setCity($this->data['to']['to-city']);
            $address->setStateProvinceCode($this->data['to']['to-province']);       // Required in US
            $address->setCountryCode($this->data['to']['to-country']);
            $shipTo = new ShipTo();
            $shipTo->setAddress($address);
            $shipTo->setCompanyName($this->data['to']['to-company']);
            $shipTo->setAttentionName($this->data['to']['to-attention']);
            $shipTo->setPhoneNumber($this->data['to']['to-phone']);
//            dd($this->data);
            $shipment->setShipTo($shipTo);

            // Set payment information
            $shipment->setPaymentInformation(new PaymentInformation('prepaid', (object)array('AccountNumber'=>'V3685E')));
            // Set service
            $service = new Service;
            $service->setCode($service_code);
            $service->setDescription($service->getName());
            $shipment->setService($service);

            if ($this->data['from']['from-country'] !== 'CA') {
                $returnService = new ReturnService();
                $returnService->setCode(ReturnService::PRINT_RETURN_LABEL_PRL);
                $shipment->setReturnService($returnService);
            }

            $invoiceLineTotal = new InvoiceLineTotal();
            $invoiceLineTotal->setCurrencyCode($desired_object['currency']);
            $invoiceLineTotal->setMonetaryValue(ltrim($desired_object['tot_charge'], '$'));
            $shipment->setInvoiceLineTotal($invoiceLineTotal);

            // Add Package
            $package = new Package();
            $package->getPackagingType()->setCode(PackagingType::PT_UPSLETTER);
            $package->getPackageWeight()->setWeight($this->data['package']['weight']);

            $unit = new UnitOfMeasurement;
            $unit->setCode($this->data['package']['weight-type']);
            $package->getPackageWeight()->setUnitOfMeasurement($unit);

            // Add descriptions because it is a package
            $package->setDescription('International Goods');

            // Add this package
            $shipment->addPackage($package);

            // Set Reference Number
            $referenceNumber = new ReferenceNumber;

            $shipment->setReferenceNumber($referenceNumber);


            // Ask for negotiated rates (optional)
            $rateInformation = new RateInformation;
            $rateInformation->setNegotiatedRatesIndicator(1);
            $shipment->setRateInformation($rateInformation);

            // Get shipment info

//            dd($this->api_key['password']);
            $api = new Shipping($this->api_key['access_key'], $this->api_key['username'], $this->api_key['password']);

            $confirm = $api->confirm(Shipping::REQ_VALIDATE, $shipment);

//            dd($confirm);

            if ($confirm) {
                $accept = $api->accept($confirm->ShipmentDigest);
                $response = response()->json($accept); // Accept holds the label and additional information
                $this->data['TrackingNumber'] = $response->getData()->PackageResults->TrackingNumber;
                $image = $response->getData()->PackageResults->LabelImage->GraphicImage;
                $image = 'data:image/jpeg;base64,' . $image;
                return ($image);
            }

//            return response($confirm); // Confirm holds the digest you need to accept the result
            return false; // Confirm holds the digest you need to accept the result

        } catch (\Exception $e) {
            $this->validateError = $e->getMessage();
            return false;
        }
    }

    public function render()
    {
        $data = $this->data;
        return view('livewire.admin.agent.envelop.details.get-quote', compact('data'));
    }
}
