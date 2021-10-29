<?php

namespace App\Http\Livewire\Home\Panel\Services\ParcelContent\Parcel;

use App\Models\OrderEnvelop;
use App\Models\OrderParcel;
use App\Models\Taxes;
use App\Models\Transactions;
use Session;
use PDF;

class PrintShipment
{
    public function printShipment()
    {
        $param = Session::get('invoice');
        $type = session('label-type');
        if ($type === 'parcel') {
            $data = OrderParcel::where('id', $param)->where('user_id', auth()->user()->id)->get()->first()->toArray();
            $trans = Transactions::where('parcel_id', $param)->first();
            $tax = Taxes::where('province', $data['province_from'])->first();
            $data['price'] = (abs($trans['price']) / (is_null($trans['percentage']) ? 1 : $trans['percentage']))/* - ($tax['tax'] + $data['insurance'])*/;
            $data['tot_price'] = abs($trans['price']) / (is_null($trans['percentage']) ? 1 : $trans['percentage'])/* - $data['insurance']*/;
            $data['tax'] = $tax['tax'];
        } else {
            $data = OrderEnvelop::where('id', $param)->where('user_id', auth()->user()->id)->get()->first()->toArray();
            $trans = Transactions::where('envelop_id', $param)->first();
            $tax = Taxes::where('province', $data['province_from'])->first();
            $data['price'] = (abs($trans['price']) / (is_null($trans['percentage']) ? 1 : $trans['percentage']))/* - ($tax['tax'] + $data['insurance'])*/;
            $data['tot_price'] = abs($trans['price']) / (is_null($trans['percentage']) ? 1 : $trans['percentage'])/* - $data['insurance']*/;
            $data['tax'] = $tax['tax'];
        }

        if (is_null($data)) {
            abort(403);
        }

//        switch ($data['service_name']) {
//            if (strpos(strtolower($item['service_name']), strtolower('Ups')) !== false) {
                $items['color'] = '#c58a0f';
                $items['image'] = 'images/logos/ups-logo.png';
                $items['x'] = '25';
                $items['y'] = '25';
//            } else if (strpos(strtolower($item['service_name']), strtolower('FedEx')) !== false) {
//                $items['color'] = '#4d148c';
//                $items['image'] = 'images/logos/fedex-logo.png';
//                $items['x'] = '40';
//                $items['y'] = '5';
//            } else if (strpos(strtolower($item['service_name']), strtolower('DHL')) !== false) {
//                $items['color'] = '#ffcc00';
//                $items['image'] = 'images/logos/dhl-logo.png';
//                $items['x'] = '40';
//                $items['y'] = '5';
//            } else if (strpos(strtolower($item['service_name']), strtolower('Canpar')) !== false) {
//                $items['color'] = '#00ff0f';
//                $items['image'] = 'my Image';
//                $items['x'] = '10';
//                $items['y'] = '10';
//            } else if (strpos(strtolower($item['service_name']), strtolower('Purolator')) !== false) {
//                $items['color'] = '#00ff0f';
//                $items['image'] = 'my Image';
//                $items['x'] = '10';
//                $items['y'] = '10';
//            } else {
//                $items['color'] = '#ffffff';
//                $items['image'] = 'none';
//            }
            $data['service_logo'] = $items;
//        }
//        dd($data);
        $pdf = PDF::loadView('livewire.home.panel.services.parcel-content.parcel.shipment', $data);
        return $pdf->download('shipment.pdf');
    }
}
