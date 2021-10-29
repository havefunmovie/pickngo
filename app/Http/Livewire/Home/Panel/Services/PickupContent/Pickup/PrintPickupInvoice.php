<?php

namespace App\Http\Livewire\Home\Panel\Services\PickupContent\Pickup;

use App\Models\OrderPackage;
use PDF;
use Session;

class PrintPickupInvoice
{
    public function printInvoice()
    {
        $param = Session::get('invoice');
        $type = session('label-type');
        $data = OrderPackage::where('id', $param)->get()->first()->toArray();
        if (is_null($data)) {
            abort(403);
        }

        $data = ['content' => $data];
        $pdf = PDF::loadView('livewire.home.panel.services.pickup-content.pickup.invoice', $data);
        return $pdf->download('invoice.pdf');
    }
}
