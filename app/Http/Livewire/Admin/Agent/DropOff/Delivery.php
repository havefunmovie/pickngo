<?php

namespace App\Http\Livewire\Admin\Agent\DropOff;

use App\Models\Dropoff;
use App\Models\User;
use Livewire\Component;
use Session;

class Delivery extends Component
{
    public $notification, $tracking_number, $availablePickup, $qty, $selectedAgent;
    public $selectAll = false;
    public $tracking_numbers = [];
    public $agents = [];
    public $selectedRows = [];
    public $printAgent;

    public function render()
    {
        return view('livewire.admin.agent.drop-off.delivery')->layout('livewire.admin.master');
    }

    public function mount()
    {
        $this->availablePickup = Dropoff::where('status','Pickup')->orderBy('id', 'desc')->get();
        $this->agents = User::where('level','agent')->where('id','!=',auth()->user()->id)->get();
    }

    public function selectAll()
    {
        if($this->selectAll == false)
        {
            $this->selectAll = true;
            $this->notification = null;
            foreach($this->availablePickup as $item)
            {
                array_push($this->selectedRows,$item->id);
            }
        }
        else
        {
            $this->selectAll = false;
            $this->notification = null;
            $this->selectedRows = null;
        }
        
    }

    public function selectRow($id)
    {
         array_push($this->selectedRows,$id);
         $this->notification = null;
    }

    public function saveContent()
    {
        $date = new \DateTime();
        $date->setTimezone(new \DateTimeZone('-0400')); //Montreal TimeZone
        $this->notification = null;

        if(($this->selectedAgent) && ($this->selectedRows))
        {
            foreach($this->selectedRows as $id)
            {
                Dropoff::where('id',$id)->update([
                    'dropoff_agent_id' => $this->selectedAgent,
                    'status' => 'Done',
                    'send_at' =>  $date->format('Y-m-d H:i:s')
                ]);
            }
            return redirect('agent/drop-off');
        }
        else
            $this->notification = 'Please select the agent / delivery list';
    }

    public function PrintTrackingNumber()
    {
    
        $data['traking_numbers'] = [];
        foreach($this->availablePickup as $item)
        {
            array_push($data['traking_numbers'], $item->tracking_number);
        }
        Session::forget('dropoff');
        Session::put('pickup', $data);
        return redirect('Agent/print-drop-off');
    }
}