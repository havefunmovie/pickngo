<?php

namespace App\Http\Livewire\Home\GetQuotesIndex;

use App\Models\Country;
use App\Models\User;
use Session;
use Livewire\Component;

class Faxing extends Component
{
    public $faxing;
    public $validated;
    public $rates;
    public $service;

    protected array $rules = [
        'faxing.agent'  => 'required',
        'faxing.count'  => 'required|numeric',
        'faxing.number' => 'required|numeric',
    ];

    public function mount($services) {
        foreach ($services as $service) {
            if ($service['service_type'] === 'faxing') {
                $this->service = $service;
                break;
            }
        }
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function faxingQuote()
    {
        $this->validate();
        $this->rates = true;
    }

    public function BackFaxing(){
        $this->rates = false;
    }

    public function render()
    {
        $recommends = null;
        $upsErrors  = null;
        if ($this->rates){
            $recommends = collect($this->getQuote());
        }
        $countries = Country::orderByRaw("FIELD(id,38,231) DESC")->get();
        $agents = User::where('level', 'agent')->where('status', '1')->get();
        return view('livewire.home.sections.getQuotes.faxing',compact('recommends','upsErrors','countries', 'agents'));
    }

    public function getQuote()
    {
        $data = $this->faxing;

        $price = $this->service['price_first_page'];
        if ($data['count'] > 1) {
            $price += ($data['count'] - 1) * $this->service['price_more_page'];
        }

        $quotes[] = [
            'service' => 'Faxing',
            'price' => $price
        ];

        $this->faxing['price'] = $price;

        return $quotes;
    }

    public function continueFaxing() {
        session()->flash('agent', $this->faxing['agent']);
        session()->flash('count', $this->faxing['count']);
        session()->flash('number', $this->faxing['number']);
        return redirect()->route('home.services.faxing');
    }
}
