<?php

namespace App\Http\Livewire\Admin\Agent\DropOff;

use App\Models\Dropoff;
use App\Models\User;
use Livewire\Component;
use Session;

class Index extends Component
{
    public $names = [],$name,$email,$phone,$tracking_number,$notification,$qty =0;
    public $data;
    public $tracking_numbers = [];
    public $company = 'Ups';

    protected $rules = [
        // 'email'     => 'sometimes|email',
        'phone'    => 'sometimes|numeric',
        'name'     => 'required|string',
        'company'  => 'required',
        'tracking_number'  => 'sometimes',
    ];

    public function findUser()
    {
        $this->names = Dropoff::where('phone' ,'like', '%'.$this->phone.'%')->pluck('name');
    }

    public function chooseName($name)
    {
        $this->name = $name;
        $this->names = NULL;
    }

    public function saveTrackingNumber()
    {
        $this->notification = null;
        $result = Dropoff::where('tracking_number', $this->tracking_number)->count();
        if($result > 0 ){
            $this->notification = "this barcode is alredy in database";
            $this->tracking_number = null;
        }
        else{
            if(in_array($this->tracking_number, $this->tracking_numbers))
            {
                $this->notification = 'this tracking number has been scanned.';
                $this->tracking_number = null;
            }
            else{
                array_push($this->tracking_numbers, $this->tracking_number); 
                $this->tracking_number = null;
                $this->qty = $this->qty +1;
            }
        }
        
    }

    public function removeTrackingNumber($tracking_number)
    {
        $key = array_search($tracking_number, $this->tracking_numbers);
        unset($this->tracking_numbers[$key]);
        $this->tracking_number = null;
        $this->qty = $this->qty -1;
    }

    public function saveFrom()
    {
        $this->notification = null;
        $date = new \DateTime();
        $date->setTimezone(new \DateTimeZone('-0400')); //Montreal TimeZone

        $this->data = $this->validate();
        $this->data['agent_id'] = auth()->user()->id;
        if($this->data['tracking_number'])
            array_push($this->tracking_numbers, $this->tracking_number); 

        $this->data['tracking_numbers'] = $this->tracking_numbers;
        foreach($this->data['tracking_numbers'] as $tracking_number)
        {
            $this->data['tracking_number'] = $tracking_number;
            $this->data['created_at'] = $date->format('Y-m-d H:i:s');
            // dd($this->data);
            Dropoff::create($this->data);
        }
        Session::forget('pickup');
        Session::put('dropoff', $this->data);
        // Event(new NewDropoffAcceptedByAgentEvent($this->data));
        return redirect('Agent/print-drop-off');
    }
    public function render()
    {
        $drivers = User::where('level','driver')->where('agent_id',auth()->user()->id)->get();
        return view('livewire.admin.agent.drop-off.index',compact('drivers'))->layout('livewire.admin.master');
    }
}