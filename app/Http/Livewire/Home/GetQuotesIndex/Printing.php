<?php

namespace App\Http\Livewire\Home\GetQuotesIndex;

use App\Models\Country;
use App\Models\Services;
use Livewire\Component;

class Printing extends Component
{
    public $printing;
    public $validated;
    public $rates;
    public $services;

    protected array $rules = [
        'printing.color'  => 'required',
        'printing.paper'  => 'required',
        'printing.count'  => 'required',
    ];

    public function mount() {
        $this->services = Services::where('service_type', 'printing')->groupBy('paper_type')->get();
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function printingQuote()
    {
        $this->validate();
        $this->rates = true;
    }

    public function BackPrinting(){
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
        return view('livewire.home.sections.getQuotes.printing', compact('recommends','upsErrors','countries'));
    }

    public function getQuote()
    {
        $data = $this->printing;

        $papers = Services::where('service_type', 'printing')->get();

        foreach ($papers as $paper) {
            if ($paper['paper_type'] == $data['paper'] && $paper['color_type'] == $data['color']) {
                $price = $paper['price_first_page'];
                if ($data['count'] > 1) {
                    $price += ($data['count'] - 1) * $paper['price_more_page'];
                }
                break;
            }
        }

        $quotes[] = [
            'service' => 'Express',
//            'time' => '1',
            'price' => $price
        ];

        $this->printing['price'] = $price;

        return $quotes;
    }

    public function continuePrinting() {
        session()->flash('color', $this->printing['color']);
        session()->flash('paper', $this->printing['paper']);
        session()->flash('count', $this->printing['count']);
        session()->flash('price', $this->printing['price']);
        return redirect()->route('home.services.printing');
    }
}
