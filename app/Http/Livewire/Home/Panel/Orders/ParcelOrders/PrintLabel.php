<?php

namespace App\Http\Livewire\Home\Panel\Orders\ParcelOrders;

use App\Models\OrderEnvelop;
use App\Models\OrderParcel;
use PDF;
use Session;

class PrintLabel
{
    public $data;

    public function printPDF()
    {
        $type= session('history_type');
        $param  = session('history_id');
        if ($type === 'parcel') {
            $this->data = OrderParcel::where('id', $param)->where('user_id', auth()->user()->id)->get()->first();
        } else {
            $this->data = OrderEnvelop::where('id', $param)->where('user_id', auth()->user()->id)->get()->first();
        }

        if (is_null($this->data)) {
            abort(403);
        }

        $data = ['content' => $this->data['label']];
        $pdf = PDF::loadView('livewire.home.panel.services.parcel-content.parcel.pdf_label', $data);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('label.pdf');
    }
}