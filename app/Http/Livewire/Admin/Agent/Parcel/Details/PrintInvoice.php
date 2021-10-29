<?php

namespace App\Http\Livewire\Admin\Agent\Parcel\Details;

use App\Models\OrderEnvelop;
use App\Models\OrderParcel;
use App\Models\Taxes;
use App\Models\Transactions;
use PDF;
use Session;

class PrintInvoice
{
    public function printInvoice()
    {
        $param = session('invoice');
        $type = session('label-type');
        if ($type === 'parcel') {
            $data = OrderParcel::where('id', $param)->where('agent_id', auth()->user()->id)->get()->first()->toArray();
            $trans = Transactions::where('parcel_id', $param)->first();
            $tax = Taxes::where('province', $data['province_from'])->first();
            $data['tot_price'] = round(abs($trans['price']),2)/* - $data['insurance']*/;
            $data['tax'] = round(($data['tot_price'] * ($tax['tax'] ?? 0)) - $data['tot_price'] ,2);
            $data['price'] = round($data['tot_price']-$data['tax'] ,2)/* - ($tax['tax'] + $data['insurance'])*/;
        } else {
            $data = OrderEnvelop::where('id', $param)->where('agent_id', auth()->user()->id)->get()->first()->toArray();
            $trans = Transactions::where('envelop_id', $param)->first();
            $tax = Taxes::where('province', $data['province_from'])->first();
            $data['price'] = (abs($trans['price']) / (is_null($trans['percentage']) ? 1 : $trans['percentage']))/* - ($tax['tax'] + $data['insurance'])*/;
            $data['tot_price'] = abs($trans['price'])/* - $data['insurance']*/;
            $data['tax'] = $tax['tax'] ?? 0;
        }

        if (is_null($data)) {
            abort(403);
        }

        $data = ['content' => $data];

        $pdf = PDF::loadView('livewire.home.panel.services.parcel-content.parcel.invoice', $data);
        // return $pdf->download('invoice.pdf');
        return $pdf->stream();
    }
}
