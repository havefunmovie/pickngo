<?php

namespace App\Http\Livewire\Home\GetQuotesIndex;


use App\Models\AgentService;
use App\Models\Country;
use App\Models\Services;
use Ups\Rate;
use Livewire\Component;
use Ups\Entity\Address;
use Ups\Entity\Package;
use Ups\Entity\ShipFrom;
use Ups\Entity\Shipment;
use Ups\Entity\Dimensions;
use Ups\Entity\PackagingType;
use Ups\Entity\UnitOfMeasurement;

class Parcel extends Component
{
    public $parcel;
    public $validated;
    public $rates;
    public $percentage;

    protected array $rules = [
        'parcel.fromCountry' => 'required',
        'parcel.fromPostal'  => 'required',
        'parcel.fromCity'    => 'required',
        'parcel.length'      => 'required|numeric',
        'parcel.width'       => 'required|numeric',
        'parcel.height'      => 'required|numeric',
        'parcel.toCountry'   => 'required',
        'parcel.toPostal'    => 'required',
        'parcel.toCity'      => 'required',
        'parcel.weight'      => 'required|numeric',
    ];

    public function mount() {
        $this->percentage = Services::where('service_type', 'user')->get()->first();
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function parcelQuote()
    {
        $this->validate();
        $this->rates = true;
    }

    public function BackParcel(){
        $this->rates = false;
    }

    public function render()
    {
        $recommends = null;
        $upsErrors  = null;
        if ($this->rates){
            try{
                $recommends = collect($this->getQuote());
            } catch (\Exception $e) {
                $upsErrors = $e->getMessage();
            }
        }
        $countries = Country::orderByRaw("FIELD(id,38,231) DESC")->get();
        return view('livewire.home.sections.getQuotes.parcel',compact('recommends','upsErrors','countries'));
    }

    public function getQuote()
    {
        $api_key = AgentService::with('agent')->get();
        $api_key = $api_key->where('agent.level', 'admin')->first();
        $rate = new Rate($api_key['access_key'], $api_key['username'], $api_key['password']);
        $data = $this->parcel;

        $shipment = new Shipment();

        // Set Address
        $address = new Address();
        $address->setPostalCode($data['fromPostal']);
        $address->setCountryCode($data['fromCountry']);

        // Set shipTo
        $shipTo = $shipment->getShipTo();

        // Set shipFrom
        $shipFrom = new ShipFrom();
        $shipFrom->setAddress($address);

        $shipToAddress = $shipTo->getAddress();
        $shipToAddress->setPostalCode($data['toPostal']);
        $shipToAddress->setCountryCode($data['toCountry']);

        $shipment->setShipFrom($shipFrom);

        // Set Package
        $package = new Package();
        $package->getPackagingType()->setCode(PackagingType::PT_PACKAGE);
        $package->getPackageWeight()->setWeight($data['weight']);;

        $dimensions = new Dimensions();
        $dimensions->setHeight($data['height']);
        $dimensions->setWidth($data['width']);
        $dimensions->setLength($data['length']);

        $unit = new UnitOfMeasurement;
        $unit->setCode(UnitOfMeasurement::UOM_IN);

        $dimensions->setUnitOfMeasurement($unit);
        $package->setDimensions($dimensions);

        $shipment->addPackage($package);

        return $rate->shopRates($shipment)->RatedShipment;
    }

    public function continueParcel() {
        session()->flash('fromCountry', $this->parcel['fromCountry']);
        session()->flash('fromPostal', $this->parcel['fromPostal']);
        session()->flash('fromCity', $this->parcel['fromCity']);
        session()->flash('toCountry', $this->parcel['toCountry']);
        session()->flash('toPostal', $this->parcel['toPostal']);
        session()->flash('toCity', $this->parcel['toCity']);
        session()->flash('weight', $this->parcel['weight']);
        session()->flash('length', $this->parcel['length']);
        session()->flash('width', $this->parcel['width']);
        session()->flash('height', $this->parcel['height']);
        return redirect()->route('home.services.parcel');
    }
}
