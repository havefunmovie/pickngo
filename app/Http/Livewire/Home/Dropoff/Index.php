<?php

namespace App\Http\Livewire\Home\Dropoff;

use App\Models\Dropoff;
use Livewire\Component;
use Session;

class Index extends Component
{
    public $name,$email,$phone,$tracking_number,$notification,$qty =0;
    public $data;
    public $tracking_numbers = [];
    public $company = 'Ups';
    
    protected $rules = [
        'email'     => 'required|email',
        'phone'    => 'required|numeric|min:5',
        'name'     => 'required|string',
        'company'  => 'required',
        'tracking_number'  => 'sometimes',
    ];

    public function render()
    {
        return view('livewire.home.dropoff.index');
    }

    public function saveTrackingNumber()
    {
        
        $this->notification = null;
        $result = Dropoff::where('tracking_number', $this->tracking_number)->count();
        if($result > 0 ){
            $this->notification = "this barcode is alredy exist in our system.";
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
            Dropoff::create($this->data);
        }
        Session::forget('pickup');
        Session::put('dropoff', $this->data);
        // Event(new NewDropoffAcceptedByAgentEvent($this->data));
        return redirect()->away(url('/Agent/print-drop-off'));
    }
}
