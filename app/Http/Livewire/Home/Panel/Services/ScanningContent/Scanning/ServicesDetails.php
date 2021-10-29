<?php

namespace App\Http\Livewire\Home\Panel\Services\ScanningContent\Scanning;

use App\Models\Taxes;
use App\Models\User;
use Livewire\Component;
use Session;

class ServicesDetails extends Component
{
    public $validated, $service;

    public $scanning = [];

    public $photo;

    public $agents;

    protected $listeners = [
        'first_step' => 'firstStep'
    ];

    protected array $rules = [
        'scanning.email' => 'required|email',
        'scanning.count' => 'required|numeric',
        'scanning.agent' => 'required',
    ];

    public function mount($services) {
        foreach ($services as $service) {
            if ($service['service_type'] === 'scanning') {
                $this->service = $service;
                break;
            }
        }
    }

    public function firstStep($data)
    {
        $this->scanning = $data['scanning'];
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function save()
    {
        $this->validate();
        $this->scanning['percentage'] = $this->service['service_percentage'];
        $tax = Taxes::where('province' , auth()->user()->province)->get()->first();
        $price = round(($this->service['price_first_page']* $tax->tax ?? 1),2);
        if ($this->scanning['count'] > 1) {
            $price += round((($this->scanning['count'] - 1) * $this->service['price_more_page'])* $tax->tax ?? 0 ,2);
        }
        $this->scanning['price'] = $price;
        $data['scanning'] = $this->scanning;

        foreach ($this->agents as $ag) {
            if ($ag['id'] == $this->scanning['agent']) {
                $agent['name'] = $ag['name'];
                $agent['address'] = $ag['address'];
                $agent['phone'] = $ag['phone'];
                $agent['operator_name'] = $ag['operator_name'];
                $data['agent'] = $agent;
                break;
            }
        }

        $this->emit('m_step', '1');
        $this->emit('get_service', $data);
    }

    public function render()
    {
        if (Session::has('agent')) {
            $data = Session::get('agent');
            $this->scanning['agent'] = $data;
            $data = Session::get('count');
            $this->scanning['count'] = $data;
            $data = Session::get('email');
            $this->scanning['email'] = $data;
        }
        $this->agents = User::where('level', 'agent')->where('status', '1')->get();
        return view('livewire.home.panel.services.scanning-content.scanning.details');
    }
}
