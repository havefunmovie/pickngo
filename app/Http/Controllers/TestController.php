<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Ups\AddressValidation;
use Ups\Entity\Address;
use Ups\Entity\AddressArtifactFormat;
use Ups\Entity\Dimensions;
use Ups\Entity\Exception;
use Ups\Entity\InvoiceLineTotal;
use Ups\Entity\Package;
use Ups\Entity\PackageServiceOptions;
use Ups\Entity\PackagingType;
use Ups\Entity\PaymentInformation;
use Ups\Entity\RateInformation;
use Ups\Entity\ReferenceNumber;
use Ups\Entity\ReturnService;
use Ups\Entity\Service;
use Ups\Entity\ShipFrom;
use Ups\Entity\Shipment;
use Ups\Entity\ShipmentWeight;
use Ups\Entity\ShipTo;
use Ups\Entity\SoldTo;
use Ups\Entity\TimeInTransitRequest;
use Ups\Entity\UnitOfMeasurement;
use Ups\Rate;
use Ups\Shipping;
use Ups\SimpleAddressValidation;
use Ups\TimeInTransit;

class TestController extends Controller
{

    public function address()
    {
        $address = new Address();
//        $address->setStateProvinceCode('NY');
        $address->setCity('New York');
        $address->setCountryCode('US');
        $address->setPostalCode('10000');

        $av = new SimpleAddressValidation();
        try {
            $response = $av->validate($address);
            dd($response);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function rate()
    {
        $rate = new Rate();

        try {
            $shipment = new Shipment();

            $shipperAddress = $shipment->getShipper()->getAddress();


            // Set Address
            $address = new Address();
//            $address->setAddressLine1('75 Rue McVey');
//            $address->setCity('Lasalle');
//            $address->setStateProvinceCode('QC');
            $address->setPostalCode('H8R3T3');
            $address->setCountryCode('CA');

            // Set shipTo
            $shipTo = $shipment->getShipTo();
//            $shipTo->setAttentionName('Mina Lynn');
            $shipToAddress = $shipTo->getAddress();
//            $shipToAddress->setAddressLine1('7255 rue lunan');
//            $shipToAddress->setCity('Brossard');
//            $shipToAddress->setStateProvinceCode('QC');
//            $shipToAddress->setPostalCode(' J4Y0N4');
//            $shipToAddress->setCountryCode('CA');

            // Set shipFrom
            $shipFrom = new ShipFrom();
//            $shipFrom->setAttentionName('Ali');
            $shipFrom->setAddress($address);

            $shipToAddress = $shipTo->getAddress();
//            $shipToAddress->setAddressLine1('75 Rue McVey');
//            $shipToAddress->setCity('Lasalle');
//            $shipToAddress->setStateProvinceCode('QC');
            $shipToAddress->setPostalCode('J4Y0N4');
            $shipToAddress->setCountryCode('CA');

            $shipment->setShipFrom($shipFrom);

            // Set service
            $service = new Service;
            $service->setCode(Service::S_AIR_2DAY);
            $service->setDescription($service->getName());
            $shipment->setService($service);

            // Set Package
            $package = new Package();
            $package->getPackagingType()->setCode(PackagingType::PT_PACKAGE);
            $package->getPackageWeight()->setWeight(10);;

            $dimensions = new Dimensions();
            $dimensions->setHeight(10);
            $dimensions->setWidth(5);
            $dimensions->setLength(10);

            $unit = new UnitOfMeasurement;
            $unit->setCode(UnitOfMeasurement::UOM_IN);

            $dimensions->setUnitOfMeasurement($unit);
            $package->setDimensions($dimensions);

            $shipment->addPackage($package);

            dd($rate->shopRates($shipment));
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function shipment()
    {
        $return = null;
        // Start shipment
        $shipment = new Shipment;

        // Set shipper
        $shipment->setDescription('1206 PTR');

        $shipper = $shipment->getShipper();
        $shipper->setName('store370');
        $shipper->setAttentionName('Vladimir');
//        $shipper->setTaxIdentificationNumber('TaxID');
        $shipper->setPhoneNumber('4509348066');
        $shipper->setShipperNumber('V3685E');
        $shipper->setShipperNumber('V3685E');
        $shipperAddress = $shipper->getAddress();
        $shipperAddress->setAddressLine1('75 Rue McVey');
        $shipperAddress->setCity('Lasalle');
        $shipperAddress->setStateProvinceCode('QC');
        $shipperAddress->setPostalCode('H8R3T3');
        $shipperAddress->setCountryCode('CA');


        // To address
        $address = new Address();
        $address->setAddressLine1('1804 Blvd le Corbusier');
        $address->setPostalCode('H7S2N3');
        $address->setCity('Laval');
        $address->setStateProvinceCode('QC');       // Required in US
        $address->setCountryCode('CA');
        $shipTo = new ShipTo();
        $shipTo->setAddress($address);
        $shipTo->setCompanyName('Vlad');
        $shipTo->setAttentionName('Vlad ED');
        $shipTo->setPhoneNumber('1234567890');
        $shipTo->setFaxNumber('1234567999');
//        $shipTo->setTaxIdentificationNumber('456999');

        $shipment->setShipTo($shipTo);


//        // From address
//        $address = new Address();
//        $address->setAddressLine1('75 Rue McVey');
//        $address->setPostalCode('H8R3T3');
//        $address->setCity('Lasalle');
//        $address->setStateProvinceCode('QC');
//        $address->setCountryCode('CA');
//        $shipFrom = new ShipFrom();
//        $shipFrom->setAddress($address);
//        $shipFrom->setName('Ali');
//        $shipFrom->setCompanyName('Ali');
//        $shipFrom->setAttentionName($shipFrom->getName());
//        $shipFrom->setPhoneNumber('1234567890');
//        $shipFrom->setFaxNumber('1234567999');
//        $shipFrom->setTaxIdentificationNumber('456999');
//        $shipment->setShipFrom($shipFrom);


        // Set payment information
        $shipment->setPaymentInformation(new PaymentInformation('prepaid', (object)array('AccountNumber' => 'V3685E')));

        // Set service
        $service = new Service;
        $service->setCode(Service::S_AIR_2DAY);
        $service->setDescription($service->getName());
        $shipment->setService($service);

        // Add Package
        $package = new Package();
        $package->getPackagingType()->setCode(PackagingType::PT_PACKAGE);
        $package->getPackageWeight()->setWeight(20);
        $unit = new UnitOfMeasurement;
        $unit->setCode(UnitOfMeasurement::UOM_LBS);
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
        try {
            $api = new Shipping();

            $confirm = $api->confirm(Shipping::REQ_VALIDATE, $shipment);

            if ($confirm) {
                $accept = $api->accept($confirm->ShipmentDigest);
                $response = response()->json($accept); // Accept holds the label and additional information
                $image = $response->getData()->PackageResults->LabelImage->GraphicImage;
                $image = 'data:image/jpeg;base64,' . $image;
                return ("<img src='{$image}' />");
            }


            return response($confirm); // Confirm holds the digest you need to accept the result


        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function shipmentTime(){
        $timeInTransit = new TimeInTransit();

        try {
            $request = new TimeInTransitRequest;

            // Addresses
            $from = new AddressArtifactFormat;
            $from->setPoliticalDivision3('Amsterdam');
            $from->setPostcodePrimaryLow('1000AA');
            $from->setCountryCode('NL');
            $request->setTransitFrom($from);

            $to = new AddressArtifactFormat;
            $to->setPoliticalDivision3('Amsterdam');
            $to->setPostcodePrimaryLow('1000AA');
            $to->setCountryCode('NL');
            $request->setTransitTo($to);

            // Weight
            $shipmentWeight = new ShipmentWeight;
            $shipmentWeight->setWeight(15);
            $unit = new UnitOfMeasurement;
            $unit->setCode(UnitOfMeasurement::UOM_KGS);
            $shipmentWeight->setUnitOfMeasurement($unit);
            $request->setShipmentWeight($shipmentWeight);

            // Packages
            $request->setTotalPackagesInShipment(2);

            // InvoiceLines
            $invoiceLineTotal = new InvoiceLineTotal;
            $invoiceLineTotal->setMonetaryValue(100.00);
            $invoiceLineTotal->setCurrencyCode('EUR');
            $request->setInvoiceLineTotal($invoiceLineTotal);

            // Pickup date
            $request->setPickupDate(new DateTime);

            // Get data
            $times = $timeInTransit->getTimeInTransit($request);

            $serviceSummaryTotal = [];
            foreach($times->ServiceSummary as $serviceSummary) {
                $serviceSummaryTotal[] = $serviceSummary;
            }
            dd($serviceSummaryTotal);
        } catch (Exception $e) {
            var_dump($e);
        }
    }
}
