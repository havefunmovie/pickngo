<?php

namespace App\Http\Livewire\Admin\Agent\DropOff;


use App\Models\User;
use PDF;
use Session;

class PrintDropoff
{
    public function Print()
    {
        if(Session::has('dropoff'))
        {
            $dropoff = Session::get('dropoff');
            $dropoff['agent'] = User::where('id',auth()->user()->id)->get()->first();
            
            $date = new \DateTime();
            $date->setTimezone(new \DateTimeZone('-0400')); //Montreal TimeZone
            $dropoff['date'] = $date->format('Y-m-d H:i:s');
            $pdf = PDF::loadView('livewire.admin.agent.drop-off.printBill', $dropoff);
            $pdf->setPaper('a2', 'portrait');
        }
        if(Session::has('pickup'))
        {
            $data = Session::get('pickup');
            $data['agent'] = User::where('id',auth()->user()->id)->get()->first();
            $date = new \DateTime();
            $date->setTimezone(new \DateTimeZone('-0400')); //Montreal TimeZone
            $data['date'] = $date->format('Y-m-d H:i:s');
            
            $pdf = PDF::loadView('livewire.admin.agent.drop-off.printDeliveryResult', $data);
            $pdf->setPaper('a2', 'portrait');
        }
        return $pdf->download('drop-off.pdf');
        // return $pdf->stream();
    }
}