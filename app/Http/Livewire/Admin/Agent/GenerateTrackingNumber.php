<?php


namespace App\Http\Livewire\Admin\Agent;

use App\Models\Mailboxes;
use App\Models\OrderEnvelop;
use App\Models\OrderFaxing;
use App\Models\OrderParcel;
use App\Models\OrderPrinting;
use App\Models\OrderScanning;
use App\Models\UserMailboxes;

class GenerateTrackingNumber
{
    public function generateBarcodeNumber($service) {
        $number = mt_rand(100000, 999999); // better than rand()

        // call the same function if the barcode exists already
        if ($this->barcodeNumberExists($number, $service)) {
            return $this->generateBarcodeNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
    }

    private function barcodeNumberExists($number, $service) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        switch ($service) {
            case 'parcel':
                return OrderParcel::where('tracking_code', $number)->exists();
            case 'envelop':
                return OrderEnvelop::where('tracking_code', $number)->exists();
            case 'scanning':
                return OrderScanning::where('tracking_code', $number)->exists();
            case 'printing':
                return OrderPrinting::where('tracking_code', $number)->exists();
            case 'faxing':
                return OrderFaxing::where('tracking_code', $number)->exists();
            case 'mailbox':
                return UserMailboxes::where('tracking_code', $number)->exists();
        }
    }
}