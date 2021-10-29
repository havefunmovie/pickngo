<?php


namespace App\Http\Livewire\Home\Panel\Services\PickupContent\Pickup;

use App\Models\OrderPackage;
use PDF;
use Session;

class PrintPickupLabel
{
    public $data;

    public function printPDF()
    {
        $param = session('image');
        $type = session('label-type');
        $this->data = OrderPackage::where('order_id', $param)->get()->first();
        

        if (is_null($this->data)) {
            abort(403);
        }

        $data = ['content' => $this->data['label']];
        $pdf = PDF::loadView('livewire.home.panel.services.pickup-content.pickup.pdf_label', $data);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('label.pdf');
    }
}