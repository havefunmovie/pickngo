<?php

namespace App\Http\Livewire\Home\Panel\Services\FaxingContent\Faxing;

use App\Models\Taxes;
use App\Models\User;
use Livewire\Component;
use Session;

class ServicesDetails extends Component
{
    public $validated, $service;

    public $faxing = [];

    public $photo;

    public $agents;

    protected $listeners = [
        'first_step' => 'firstStep'
    ];

    public function mount($services) {
        foreach ($services as $service) {
            if ($service['service_type'] === 'faxing') {
                $this->service = $service;
                break;
            }
        }
    }

    protected array $rules = [
        'faxing.number' => 'required|numeric',
        'faxing.count' => 'required|numeric',
        'faxing.agent' => 'required',
    ];

    public function firstStep($data)
    {
        $this->faxing = $data['faxing'];
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function save()
    {
        $this->validate();
        $this->faxing['percentage'] = $this->service['service_percentage'];
        $tax = Taxes::where('province' , auth()->user()->province)->get()->first();
        $price = round(($this->service['price_first_page']* $tax->tax ?? 1),2);
        if ($this->faxing['count'] > 1) {
            $price += round((($this->faxing['count'] - 1) * $this->service['price_more_page'])* $tax->tax ?? 0 ,2);
        }
        $this->faxing['price'] = $price;
        $data['faxing'] = $this->faxing;

        foreach ($this->agents as $ag) {
            if ($ag['id'] == $this->faxing['agent']) {
                $agent['name'] = $ag['name'];
                $agent['address'] = $ag['address'];
                $agent['phone'] = $ag['mobile'];
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
            $this->faxing['agent'] = $data;
            $data = Session::get('number');
            $this->faxing['number'] = $data;
            $data = Session::get('count');
            $this->faxing['count'] = $data;
        }
        $this->agents = User::where('level', 'agent')->where('status', '1')->get();
        return view('livewire.home.panel.services.faxing-content.faxing.details');
    }
}
