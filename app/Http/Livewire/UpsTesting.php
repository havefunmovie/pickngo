<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Ups\Entity\Address;
use Ups\Entity\Dimensions;
use Ups\Entity\Package;
use Ups\Entity\PackagingType;
use Ups\Entity\Service;
use Ups\Entity\ShipFrom;
use Ups\Entity\Shipment;
use Ups\Entity\UnitOfMeasurement;
use Ups\Rate;

class UpsTesting extends Component
{
    public $fromcountry;
    public $frompostalcode;
    public $tocountry;
    public $topostalcode;
    public $weight;
    public $w;
    public $h;
    public $l;

    public $rates = false;

    protected $rules = [
        'fromcountry' => 'required',
        'frompostalcode' => 'required',
        'tocountry' => 'required',
        'topostalcode' => 'required',
        'weight' => 'required',
        'w' => 'required',
        'h' => 'required',
        'l' => 'required',
    ];


    public function handleForm()
    {
        $this->validate();
        $this->rates = true;
    }

    public function render()
    {
        $results = false;
        $error = false;
        if ($this->rates){
            try{
                $results = collect($this->getRates());
            } catch (\Exception $e) {
                $error = $e->getMessage();
            }
        }


        return view('livewire.ups-testing',compact('results','error'))
            ->extends('home.layouts.master');
    }

    public function getRates()
    {
        $rate = new Rate();

        $shipment = new Shipment();

        $shipperAddress = $shipment->getShipper()->getAddress();

        // Set Address
        $address = new Address();
//        $address->setPostalCode('H8R3T3');
        $address->setPostalCode($this->frompostalcode);
//        $address->setCountryCode('CA');
        $address->setCountryCode($this->fromcountry);

        // Set shipTo
        $shipTo = $shipment->getShipTo();
        $shipToAddress = $shipTo->getAddress();


        // Set shipFrom
        $shipFrom = new ShipFrom();
        $shipFrom->setAddress($address);

        $shipToAddress = $shipTo->getAddress();

//        $shipToAddress->setPostalCode('J4Y0N4');
        $shipToAddress->setPostalCode($this->topostalcode);
//        $shipToAddress->setCountryCode('CA');
        $shipToAddress->setCountryCode($this->tocountry);

        $shipment->setShipFrom($shipFrom);

        // Set Package
        $package = new Package();
        $package->getPackagingType()->setCode(PackagingType::PT_PACKAGE);
        $package->getPackageWeight()->setWeight($this->weight);;

        $dimensions = new Dimensions();
        $dimensions->setHeight($this->h);
        $dimensions->setWidth($this->w);
        $dimensions->setLength($this->l);

        $unit = new UnitOfMeasurement;
        $unit->setCode(UnitOfMeasurement::UOM_IN);

        $dimensions->setUnitOfMeasurement($unit);
        $package->setDimensions($dimensions);

        $shipment->addPackage($package);

        return $rate->shopRates($shipment)->RatedShipment;
    }
}
