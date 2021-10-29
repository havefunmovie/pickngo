<?php

namespace App\Http\Livewire\Admin\Agent\Parcel\Details;

use App\Models\OrderEnvelop;
use App\Models\OrderFaxing;
use App\Models\OrderParcel;
use App\Models\OrderPrinting;
use App\Models\OrderScanning;
use App\Models\Taxes;
use App\Models\Transactions;
use App\Models\User;
use PDF;
use Session;

class PrintLabel
{
    public $data;

    public function printPDF()
    {
        $param = session('image');
        $type = session('label-type');
        if ($type === 'parcel') {
            $this->data = OrderParcel::where('id', $param)->where('agent_id', auth()->user()->id)->get()->first();
        } 
        elseif($type === 'scanning')
        {
            $this->data = OrderScanning::where('id', $param)->where('agent_id', auth()->user()->id)->get()->first();
        }
        elseif($type === 'faxing')
        {
            $this->data = OrderFaxing::where('id', $param)->where('agent_id', auth()->user()->id)->get()->first();
        }
        elseif($type === 'printing')
        {
            $this->data = OrderPrinting::where('id', $param)->where('agent_id', auth()->user()->id)->get()->first();
        }
        else {
            $this->data = OrderEnvelop::where('id', $param)->where('agent_id', auth()->user()->id)->get()->first();
        }

        if (is_null($this->data)) {
            abort(403);
        }



        // download bills
        if(($type === 'parcel')|| $type === 'envelop')
        {
            $data = ['content' => $this->data['label']];
            $pdf = PDF::loadView('livewire.home.panel.services.parcel-content.parcel.pdf_label', $data);
            $pdf->setPaper('a4', 'landscape');
            return $pdf->download('label.pdf');
        }

        if(($type === 'scanning')|| $type === 'faxing' || $type === 'printing')
        {
            $typeId = $type.'_id';
            $this->data['agent'] = User::where('id',$this->data->agent_id)->first();
            $this->data['transaction'] = Transactions::where($typeId , $this->data->id)->first();
            $tax = Taxes::where('province' , auth()->user()->province)->first();
            $this->data['tax'] = abs(round((abs($this->data['transaction']->price)/$tax->tax) - abs($this->data['transaction']->price) ,2));
            $data = $this->data;
            $pdf = PDF::loadView('livewire.admin.agent.scanning.details.invoice', ['data' => $data]);
            $pdf->setPaper('a6', 'portrait');
            return $pdf->download('label.pdf');
        }
    }
}
