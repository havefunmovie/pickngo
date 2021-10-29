<?php

namespace App\Http\Livewire\Admin\Agent\PrintReceipt;

use App\Events\NewDropoffAcceptedByAgentEvent;
use App\Models\Receipt;
use App\Models\User;
use Event;
use Livewire\Component;
use Session;

class Send extends Component
{
    public $send_tracking_number,$sendPackage,$driver_id,$error,$send_qty =0,$note;
    public $data;
    public $send_tracking_numbers = [];

    public function saveSendTrackingNumber()
    {
        $this->error = null;
        $result = Receipt::where('tracking_number',$this->send_tracking_number)->count();
        if($result <= 0)
        {
            $this->error = 'This barcode is not existing in PRINT RECEIPT database ';
            $this->send_tracking_number = null;
        }
        else
        {
            if(in_array($this->send_tracking_number, $this->send_tracking_numbers))
            {
                $this->error = 'this tracking number has been scanned.';
                $this->send_tracking_number = null;
            }
            else{
                array_push($this->send_tracking_numbers, $this->send_tracking_number); 
                $this->send_tracking_number = null;
                $this->send_qty = $this->send_qty +1;
            }    
        }
    }

    public function removeSendTrackingNumber($send_tracking_number)
    {
        $key = array_search($send_tracking_number, $this->send_tracking_numbers);
        unset($this->send_tracking_numbers[$key]);
        $this->send_tracking_number = null;
        $this->send_qty = $this->send_qty -1;
    }

    public function updateTrackingNumberStatus()
    {
        $this->error = null;
        $date = new \DateTime();
        $date->setTimezone(new \DateTimeZone('-0400')); //Montreal TimeZone

        if(($this->driver_id) && ($this->send_tracking_numbers != null))
        {
            foreach($this->send_tracking_numbers as $send_tracking_number){
               Receipt::where('tracking_number',$send_tracking_number)->update(['status' => 'Done' , 'dropoff_agent_id' => $this->driver_id ,'note' => $this->note , 'send_at' , $date->format('Y-m-d H:i:s') ]);
                return redirect('agent/print-receipt');
            }
        }
        else
            $this->error = "driver / barcode is empty";
    }
    public function render()
    {
        $drivers = User::where('level','driver')->get();
        $total_qty = Receipt::where('status','Pending')->count();
        return view('livewire.admin.agent.print-recipt.send',compact('drivers','total_qty'))->layout('livewire.admin.master');
    }
}