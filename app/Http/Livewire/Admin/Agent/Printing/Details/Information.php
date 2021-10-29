<?php

namespace App\Http\Livewire\Admin\Agent\Printing\Details;

use App\Models\Services;
use App\Models\Taxes;
use App\Models\User;
use Livewire\Component;
use Session;
use Livewire\WithFileUploads;

class information extends Component
{
    use WithFileUploads;
    public $validated,$email,$price,$paper_count,$paper_type,$color_type,$service,$services, $tax,$user;
    public $printing = [];
    public $showQuote = false;
    public $showInfo = true;

    protected function rules()
    {
        if(isset($this->user))
            return [
                'email'         => 'required|email',
                'paper_count'   => 'required',
                'paper_type'    => 'required',
                'color_type'    => 'required',
            ];
        else
            return [
                'email'         => 'required|email|unique:users',
                'paper_count'   => 'required',
                'paper_type'    => 'required',
                'color_type'    => 'required',
            ];
    }

    public function mount()
    {
        $this->services = Services::where('service_type','printing')->get();
        if (Session::has('newPrintingForExistingUser')) 
        {
            $this->user = User::where('id', session('newPrintingForExistingUser'))->get()->first();
            $this->email = $this->user->email;
        }
        else
            $this->user = null;
    }

    public function getQuote()
    {
        $this->printing = $this->validate();
        $this->tax = Taxes::where('province' , auth()->user()->province)->get()->first();
        $this->service = Services::where('service_type' , 'printing')->where('paper_type',$this->printing['paper_type'])->where('color_type',$this->printing['color_type'])->get()->first();
        $this->paper_count = $this->printing['paper_count'];
        $this->printing['price'] = round(($this->service['price_first_page']* $this->tax->tax ?? 1),2);
        if ($this->printing['paper_count'] > 1) {
            $this->printing['price'] += round((($this->printing['paper_count'] - 1) * $this->service['price_more_page'])* $this->tax->tax ?? 0 ,2);
        }
        if(isset($this->user))
            $this->printing['user_id'] = $this->user->id;
        $this->printing['service_percentage'] = $this->service['service_percentage'];
        $this->showInfo = false;
        $this->showQuote = true;
        $this->emit('next_step');
        $this->emit('getQuote',$this->printing);
    }

    public function render()
    {
        $validated = $this->validated;
        $agent = User::where('id',auth()->user()->id)->where('level', 'agent')->get();
        return view('livewire.admin.agent.printing.details.information', compact('validated', 'agent'));
    }
}
