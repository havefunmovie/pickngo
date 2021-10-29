<?php

namespace App\Http\Livewire\Home\GetQuotesIndex;

use App\Models\Country;
use App\Models\User;
use Session;
use Livewire\Component;

class Scanning extends Component
{
    public $scanning;
    public $validated;
    public $rates;
    public $service;

    protected array $rules = [
        'scanning.agent'  => 'required',
        'scanning.count'  => 'required|numeric',
        'scanning.email'  => 'required|email',
    ];

    public function mount($services) {
        foreach ($services as $service) {
            if ($service['service_type'] === 'scanning') {
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

    public function scanningQuote()
    {
        $this->validate();
        $this->rates = true;
    }

    public function BackScanning(){
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
        return view('livewire.home.sections.getQuotes.scanning',compact('recommends','upsErrors','countries', 'agents'));
    }

    public function getQuote()
    {
        $data = $this->scanning;

        $price = $this->service['price_first_page'];
        if ($data['count'] > 1) {
            $price += ($data['count'] - 1) * $this->service['price_more_page'];
        }

        $quotes[] = [
            'service' => 'Scanning',
            'price' => $price
        ];

        $this->scanning['price'] = $price;

        return $quotes;
    }

    public function continueScanning() {
        session()->flash('agent', $this->scanning['agent']);
        session()->flash('count', $this->scanning['count']);
        session()->flash('email', $this->scanning['email']);
        return redirect()->route('home.services.scanning');
    }
}
