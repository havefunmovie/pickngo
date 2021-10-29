<?php

namespace App\Http\Livewire\Home\Panel\Services\PickupContent\Pickup;

use App\Models\Order;
use Session;
use PDF;

class PrintPickupShipment
{
    public function printShipment()
    {
        $param = Session::get('invoice');
        $type = session('label-type');

        $data = Order::where('id', $param)->where('user_id', auth()->user()->id)->with('package')->get()->first()->toArray();

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
        $pdf = PDF::loadView('livewire.home.panel.services.package-content.package.shipment', $data);
        return $pdf->download('shipment.pdf');
    }
}
