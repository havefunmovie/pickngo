<?php

namespace App\Http\Livewire\Admin\Agent\PrintReceipt;

use App\Models\User;
use PDF;
use Session;

class PrintReceipt
{
    

    public function Print()
    {
        $data = Session::get('receipt');
        $data['agent'] = User::where('id',$data['agent_id'])->get()->first();
        
        $date = new \DateTime();
        $date->setTimezone(new \DateTimeZone('-0400')); //Montreal TimeZone
        $data['date'] = $date->format('Y-m-d H:i:s');

        $pdf = PDF::loadView('livewire.admin.agent.print-recipt.printBill', $data);
        $pdf->setPaper('a6', 'portrait');
        return $pdf->download('drop-off.pdf');
    }
}