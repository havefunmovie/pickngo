<?php

namespace App\Http\Livewire\Admin\Agent\DropOff;

use App\Models\Dropoff;
use Livewire\Component;
use Session;

class Pickup extends Component
{
    public $notification, $tracking_number, $availableDropofs, $qty;
    public $pickupByAgent = false;
    public $tracking_numbers = [];

    public function render()
    {
        $this->availableDropofs = Dropoff::where('status','Pending')->count();
        return view('livewire.admin.agent.drop-off.pickup')->layout('livewire.admin.master');
    }

    public function pickupByAgent()
    {
        $this->pickupByAgent = 'show';
    }

    public function saveSendTrackingNumber()
    {
        $this->notification = null;

        $result = Dropoff::where('tracking_number',$this->tracking_number)->first();
        if($result == null)
        {
            $this->notification = 'This barcode is not existing in DROPOFF database';
            $this->tracking_number = null;
        }
        elseif($result->status == 'Done')
        {
            $this->notification = 'This barcode sent previously';
            $this->tracking_number = null;
        }
        elseif($result->status == 'Pickup')
        {
            $this->notification = 'This package has been PICKED UP ';
            $this->tracking_number = null;
        }
        else
        {
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
        if($this->tracking_numbers)
        {
            foreach($this->tracking_numbers as $tracking_number)
            {
                Dropoff::where('tracking_number',$tracking_number)->update(['status' => 'Pickup']);
            }
            // Session::put('dropoff', $this->data);
            return redirect('agent/drop-off');
        }
        else
            $this->notification = 'Please scan at least one item';
    }
}