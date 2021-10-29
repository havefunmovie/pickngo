<?php

namespace App\Http\Livewire\Admin\Agent\Scanning\Details;

use App\Models\Services;
use App\Models\Taxes;
use App\Models\User;
use Livewire\Component;
use Session;

class information extends Component
{
    public $validated,$email,$price,$paper_count,$service, $tax,$user;
    public $scanning = [];
    public $showQuote = false;
    public $showInfo = true;

    protected function rules()
    {
        if(isset($this->user))
            return [
                'email'       => 'required|email',
                'paper_count' => 'required|numeric|min:1',
            ];
        else
            return [
                'email'       => 'required|email|unique:users',
                'paper_count' => 'required|numeric|min:1',
            ];
    }

    public function getQuote()
    {
        $this->tax = Taxes::where('province' , auth()->user()->province)->get()->first();
        $this->service = Services::where('service_type' , 'scanning')->get()->first();
        $this->scanning = $this->validate();
        $this->paper_count = $this->scanning['paper_count'];
        $this->scanning['price'] = round(($this->service['price_first_page']* $this->tax->tax ?? 1),2);
        if ($this->scanning['paper_count'] > 1) {
            $this->scanning['price'] += round((($this->scanning['paper_count'] - 1) * $this->service['price_more_page'])* $this->tax->tax ?? 0 ,2);
        }
        if(isset($this->user))
            $this->scanning['user_id'] = $this->user->id;
        $this->scanning['service_percentage'] = $this->service['service_percentage'];  
        $this->showInfo = false;
        $this->showQuote = true;
        $this->emit('next_step');
        $this->emit('getQuote',$this->scanning);
    }
    public function mount()
    {
        if (Session::has('newScanningForExistingUser')) 
        {
            $this->user = User::where('id', session('newScanningForExistingUser'))->get()->first();
            $this->email = $this->user->email;
        }
        else
            $this->user = null;
    }

    public function render()
    {
        $validated = $this->validated;
        $agent = User::where('id',auth()->user()->id)->where('level', 'agent')->get()->first();
        return view('livewire.admin.agent.scanning.details.information', compact('validated','agent'));
    }
}
