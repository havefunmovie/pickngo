<?php

namespace App\Http\Livewire\Admin\Agent\Parcel\Details;

use App\Models\OrderEnvelop;
use App\Models\OrderParcel;
use App\Models\Taxes;
use App\Models\Transactions;
use App\Models\User;
use PDF;

class PrintBill
{
    public $data;

    public function printBill()
    {
        $param = session('image');
        $type = session('label-type');
        if ($type === 'parcel') {
            $typeId = $type.'_id';
            $this->data = OrderParcel::where('id', $param)->where('agent_id', auth()->user()->id)->get()->first();
        } 
        else {
            $typeId = $type.'_id';
            $this->data = OrderEnvelop::where('id', $param)->where('agent_id', auth()->user()->id)->get()->first();
        }
        $this->data['agent'] = User::where('id',auth()->user()->id)->first();
        $this->data['transaction'] = Transactions::where($typeId , $this->data->id)->first();
        $tax = Taxes::where('province' , auth()->user()->province)->first();
        $this->data['tax'] = abs(round((abs($this->data['transaction']->price)/$tax->tax) - abs($this->data['transaction']->price) ,2));
        $data = $this->data;

        $date = new \DateTime();
        $date->setTimezone(new \DateTimeZone('-0400')); //Montreal TimeZone
        $data['date'] = $date->format('Y-m-d H:i:s');
        
        if (is_null($this->data)) {
            abort(403);
        }
        // download bills
        $pdf = PDF::loadView('livewire.admin.agent.parcel.details.bill', ['data' => $data]);
        $pdf->setPaper('a3', 'portrait');
        // return $pdf->download('bill.pdf');
        return $pdf->stream();
    }
}