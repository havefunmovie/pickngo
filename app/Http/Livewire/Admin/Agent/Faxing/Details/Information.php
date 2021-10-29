<?php

namespace App\Http\Livewire\Admin\Agent\Faxing\Details;

use App\Models\Services;
use App\Models\Taxes;
use App\Models\User;
use Livewire\Component;
use Session;

class information extends Component
{
    public $validated,$phone,$email,$price,$paper_count,$service, $tax,$user;
    public $faxing = [];
    public $showQuote = false;
    public $showInfo = true;

    protected function rules()
    {
        if(isset($this->user))
            return [
                'email'       => 'required|email',
                'phone'       => 'required|numeric',
                'paper_count' => 'required|numeric|min:1',
            ];
        else
            return [
                'email'       => 'required|email|unique:users',
                'phone'       => 'required|numeric',
                'paper_count' => 'required|numeric|min:1',
            ];
    }

    public function getQuote()
    {
        $this->tax = Taxes::where('province' , auth()->user()->province)->get()->first();
        $this->service = Services::where('service_type' , 'faxing')->get()->first();
        $this->faxing = $this->validate();
        $this->paper_count = $this->faxing['paper_count'];
        $this->faxing['price'] = round(($this->service['price_first_page']* $this->tax->tax ?? 1),2);
        if ($this->faxing['paper_count'] > 1) {
            $this->faxing['price'] += round((($this->faxing['paper_count'] - 1) * $this->service['price_more_page'])* $this->tax->tax ?? 0 ,2);
        }
        if(isset($this->user))
        $this->faxing['user_id'] = $this->user->id;
        $this->faxing['service_percentage'] = $this->service['service_percentage']; 
        $this->showInfo = false;
        $this->showQuote = true;
        $this->emit('next_step');
        $this->emit('getQuote',$this->faxing);
    }

    public function mount()
    {
        if (Session::has('newFaxingForExistingUser')) 
        {
            $this->user = User::where('id', session('newFaxingForExistingUser'))->get()->first();
            $this->email = $this->user->email;
            $this->phone = $this->user->mobile;
        }
        else
            $this->user = null;
    }

    public function render()
    {
        $validated = $this->validated;
        $agent = User::where('id',auth()->user()->id)->where('level', 'agent')->get();
        return view('livewire.admin.agent.faxing.details.information', compact('validated', 'agent'));
    }
}
