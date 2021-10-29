<?php

namespace App\Http\Livewire\Home\Panel\Services\EnvelopContent\Envelop;

use App\Http\Livewire\Admin\Agent\GenerateTrackingNumber;
use App\Models\AddressBook;
use App\Models\OrderEnvelop;
use App\Models\Transactions;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use mysql_xdevapi\Exception;
use Session;
use Ups\Entity\Address;
use Ups\Entity\Dimensions;
use Ups\Entity\Package;
use Ups\Entity\PackagingType;
use Ups\Entity\PaymentInformation;
use Ups\Entity\RateInformation;
use Ups\Entity\ReferenceNumber;
use Ups\Entity\Service;
use Ups\Entity\ShipFrom;
use Ups\Entity\Shipment;
use Ups\Entity\Shipper;
use Ups\Entity\ShipTo;
use Ups\Entity\UnitOfMeasurement;
use Ups\Shipping;

class ServicesGetLabel extends Component
{
    public $data, $error, $api_key;

    public $label;

    protected $listeners = [
        'get_label' => 'getLabel'
    ];

    public function mount($data, $apiKey) {
        $this->data = $data;
        $this->api_key = $apiKey;
        if ($data) {
            if ($this->label = $this->createLabel()) {
                $label = $this->label;

//                $this->label = "<img src='{$this->label}' />";
                $image = str_replace('data:image/jpeg;base64,', '', $label);
                $image = str_replace(' ', '+', $image);
                $this->label = $imageName = $data['trackingNumber'] . '.png';

                Storage::disk('public_files')->put('images/labels/' . $imageName, base64_decode($image));

                $trak_num = new GenerateTrackingNumber();
                $tracking_number = $trak_num->generateBarcodeNumber('envelop');

                OrderEnvelop::where('id', $data['id'])->update([
                    'tracking_code' => $data['trackingNumber'],
                    'tracking_code_1' => $tracking_number,
                    'label' => $imageName,
                ]);

                Transactions::where('envelop_id', $data['id'])->update([
                    'status' => 'successful'
                ]);

                Session::put('image', $data['id']);
                Session::put('label-type', 'envelop');
                Session::put('invoice', $data['id']);
                Session::put('invoice-type', 'envelop');
            }
        }
    }

    public function getLabel($params, $serviceSummary, $image) {
//        $this->data = $params;
//        $this->label = "<img src='{$image}' />";
//        $this->emit('m_step', '4');
//
//        $image = str_replace('data:image/jpeg;base64,', '', $image);
//        $image = str_replace(' ', '+', $image);
//        $imageName = $serviceSummary['TrackingNumber'] . '.png';
//
//        Storage::disk('public_files')->put('images/labels/' . $imageName, base64_decode($image));
//
////        $trak_num = new GenerateTrackingNumber();
//        try {
//            $order = OrderEnvelop::create([
//                'tracking_code' => $serviceSummary['TrackingNumber'],
//                'label' => $imageName,
//                'user_id' => auth()->user()->id,
//                'weight' => $params['package']['weight'],
//                'weight_type' => $params['package']['weight-type'],
//                'service_code' => $serviceSummary['service_code'],
//                'service_name' => $serviceSummary['service_name'],
//                'country_to' => $params['to']['country'],
//                'province_to' => $params['to']['province'],
//                'city_to' => $params['to']['city'],
//                'name_to' => $params['to']['company'],
//                'line_1_to' => $params['to']['address1'],
//                'attention_to' => $params['to']['attention'],
//                'postal_code_to' => $params['to']['postal'],
//                'trans_type_to' => $params['to']['trans_type'],
//                'phone_to' => $params['to']['phone'],
//                'email_to' => $params['to']['email'],
//                'instruction_to' => $params['to']['instruction'],
//                'country_from' => $params['from']['country'],
//                'province_from' => $params['from']['province'],
//                'city_from' => $params['from']['city'],
//                'name_from' => $params['from']['company'],
//                'line_1_from' => $params['from']['address1'],
//                'attention_from' => $params['from']['attention'],
//                'postal_code_from' => $params['from']['postal'],
//                'trans_type_from' => $params['from']['trans_type'],
//                'phone_from' => $params['from']['phone'],
//                'email_from' => $params['from']['email'],
//                'instruction_from' => $params['from']['instruction']
//            ]);
//
//            Session::put('image', $order->id);;
//            Session::put('label-type', 'envelop');
//            Session::put('invoice', $order->id);
//            Session::put('invoice-type', 'envelop');
//
//            Transactions::create([
//                'trans_code' => $serviceSummary['transaction_id'],
//                'price' => ltrim($serviceSummary['negotiated_charge'], '$'),
//                'currency' => $serviceSummary['currency'],
//                'status' => 'successful',
//                'payed_by' => 'paypal',
//                'envelop_id' => $order->id,
//                'user_id' => auth()->user()->id,
//            ]);
//
//            if ($params['to']['addressBook']) {
//                AddressBook::create([
//                    'name' => $params['to']['company'],
//                    'user_id' => auth()->user()->id,
//                    'type' => 'to',
//                    'country' => $params['to']['country'],
//                    'province' => $params['to']['province'],
//                    'city' => $params['to']['city'],
//                    'line_1' => $params['to']['address1'],
//                    'line_2' => ($params['to']['address2'] ?? ''),
//                    'attention' => $params['to']['attention'],
//                    'postal_code' => $params['to']['postal'],
//                    'trans_type' => $params['to']['trans_type'],
//                    'phone' => $params['to']['phone'],
//                    'email' => $params['to']['email'],
//                    'instruction' => $params['to']['instruction'],
//                    'service_type' => 'envelop'
//                ]);
//            }
//            if ($params['from']['addressBook']) {
//                AddressBook::create([
//                    'name' => $params['from']['company'],
//                    'user_id' => auth()->user()->id,
//                    'type' => 'from',
//                    'country' => $params['from']['country'],
//                    'province' => $params['from']['province'],
//                    'city' => $params['from']['city'],
//                    'line_1' => $params['from']['address1'],
//                    'line_2' => ($params['from']['address2'] ?? ''),
//                    'attention' => $params['from']['attention'],
//                    'postal_code' => $params['from']['postal'],
//                    'trans_type' => $params['from']['trans_type'],
//                    'phone' => $params['from']['phone'],
//                    'email' => $params['from']['email'],
//                    'instruction' => $params['from']['instruction'],
//                    'service_type' => 'envelop'
//                ]);
//            }
//        } catch (Exception $e) {
//            dd($e);
//        }
    }

    public function render()
    {
        return view('livewire.home.panel.services.envelop-content.envelop.get-label');
    }

    public function createLabel()
    {
        $shipment = new Shipment;

        try {
            // Set shipper
            $shipment->setDescription('1206 PTR');

            $shipper = $shipment->getShipper();
            $address = new Address();
            if ($this->data['country_from'] === 'CA') {
                $shipper->setName($this->data['name_from']);
                $shipper->setAttentionName($this->data['name_from']);
                $shipper->setPhoneNumber($this->data['phone_from']);
                $address->setAddressLine1($this->data['line_1_from']);
                $address->setCity($this->data['city_from']);
                $address->setPostalCode($this->data['postal_code_from']);
                $address->setStateProvinceCode($this->data['province_from']);
                $address->setCountryCode($this->data['country_from']);
            } else {
                $shipper->setName($this->data['name_to']);
                $shipper->setAttentionName($this->data['name_to']);
                $shipper->setPhoneNumber($this->data['phone_to']);
                $address->setAddressLine1($this->data['line_1_to']);
                $address->setCity($this->data['city_to']);
                $address->setPostalCode($this->data['postal_code_to']);
                $address->setStateProvinceCode($this->data['province_to']);
                $address->setCountryCode($this->data['country_to']);
            }
            $shipper->setShipperNumber($this->api_key['account_number']);
            $shipper->setAddress($address);
            $shipment->setShipper($shipper);

            $shipperAddress = new Address();
            $shipperAddress->setAddressLine1($this->data['line_1_from']);
            $shipperAddress->setCity($this->data['city_from']);
            $shipperAddress->setStateProvinceCode($this->data['province_from']);
            $shipperAddress->setPostalCode($this->data['postal_code_from']);
            $shipperAddress->setCountryCode($this->data['country_from']);

            $shipFrom = new ShipFrom();
            $shipFrom->setAddress($shipperAddress);
            $shipFrom->setCompanyName($this->data['name_from']);
            $shipFrom->setAttentionName($this->data['name_from']);
            $shipFrom->setPhoneNumber($this->data['phone_from']);
//            dd($this->data);
            $shipment->setShipFrom($shipFrom);

            // To address
            $address = new Address();
            $address->setAddressLine1($this->data['line_1_to']);
            $address->setPostalCode($this->data['postal_code_to']);
            $address->setCity($this->data['city_to']);
            $address->setStateProvinceCode($this->data['province_to']);       // Required in US
            $address->setCountryCode($this->data['country_to']);
            $shipTo = new ShipTo();
            $shipTo->setAddress($address);
            $shipTo->setCompanyName($this->data['name_to']);
            $shipTo->setAttentionName($this->data['name_to']);
            $shipTo->setPhoneNumber($this->data['phone_to']);
//            dd($this->data);
            $shipment->setShipTo($shipTo);

            // Set payment information
            $shipment->setPaymentInformation(new PaymentInformation('prepaid', (object)array('AccountNumber' => $this->api_key['account_number'])));
            // Set service
            $service = new Service;
            $service->setCode($this->data['service_code']);
            $service->setDescription($service->getName());
            $shipment->setService($service);

            // Add Package
            $package = new Package();
            $package->getPackagingType()->setCode(PackagingType::PT_UPSLETTER);
            $package->getPackageWeight()->setWeight($this->data['weight']);

            $unit = new UnitOfMeasurement;
            $unit->setCode($this->data['weight_type']);
            $package->getPackageWeight()->setUnitOfMeasurement($unit);

            // Add descriptions because it is a package
            $package->setDescription('International Goods');

//            $dimensions = new Dimensions();
//            $dimensions->getUnitOfMeasurement()->setCode($this->data['dimen_type']);
//            $dimensions->setHeight($this->data['height'])->setLength($this->data['length'])->setWidth($this->data['width']);
//            $package->setDimensions($dimensions);

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

            $api = new Shipping($this->api_key['access_key'], $this->api_key['username'], $this->api_key['password']);

            $confirm = $api->confirm(Shipping::REQ_VALIDATE, $shipment);

//            dd($confirm);

            if ($confirm) {
                $accept = $api->accept($confirm->ShipmentDigest);
                $response = response()->json($accept); // Accept holds the label and additional information
                $this->data['trackingNumber'] = $response->getData()->PackageResults->TrackingNumber;
                $image = $response->getData()->PackageResults->LabelImage->GraphicImage;
                $image = 'data:image/jpeg;base64,' . $image;
                return ($image);
            }

//            return response($confirm); // Confirm holds the digest you need to accept the result
            return false; // Confirm holds the digest you need to accept the result

        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }
}
