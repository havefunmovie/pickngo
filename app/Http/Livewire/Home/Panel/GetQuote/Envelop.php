<?php

namespace App\Http\Livewire\Home\Panel\GetQuote;

use App\Models\AgentService;
use App\Models\Country;
use App\Models\Services;
use Livewire\Component;
use Ups\Entity\Address;
use Ups\Entity\Dimensions;
use Ups\Entity\Package;
use Ups\Entity\PackagingType;
use Ups\Entity\ShipFrom;
use Ups\Entity\Shipment;
use Ups\Entity\UnitOfMeasurement;
use Ups\Rate;

class Envelop extends Component
{
    public $envelop;
    public $validated;
    public $rates;
    public $percentage;

    protected array $rules = [
        'envelop.fromCountry' => 'required',
        'envelop.fromPostal'  => 'required',
        'envelop.fromCity'    => 'required',
        'envelop.toCountry'   => 'required',
        'envelop.toPostal'    => 'required',
        'envelop.toCity'      => 'required',
        'envelop.weight'      => 'required|numeric',
    ];

    public function mount() {
        $this->percentage = Services::where('service_type', 'user')->get()->first();
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function envelopQuote()
    {
        $this->validate();
        $this->rates = true;
    }

    public function Backenvelop(){
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
        return view('livewire.home.panel.get-quote.envelop',compact('recommends','upsErrors','countries'));
    }

    public function getQuote()
    {
        $api_key = AgentService::with('agent')->get();
        $api_key = $api_key->where('agent.level', 'admin')->first();
        $rate = new Rate($api_key['access_key'], $api_key['username'], $api_key['password']);
        $data = $this->envelop;

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
        $package->getPackagingType()->setCode(PackagingType::PT_UPSLETTER);
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

    public function continueEnvelop() {
        session()->flash('fromCountry', $this->envelop['fromCountry']);
        session()->flash('fromPostal', $this->envelop['fromPostal']);
        session()->flash('fromCity', $this->envelop['fromCity']);
        session()->flash('toCountry', $this->envelop['toCountry']);
        session()->flash('toPostal', $this->envelop['toPostal']);
        session()->flash('toCity', $this->envelop['toCity']);
        session()->flash('weight', $this->envelop['weight']);
        return redirect()->route('home.services.envelop');
    }
}
