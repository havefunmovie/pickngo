<?php

namespace App\Http\Livewire\Home\Panel\Orders;

use Ups\Tracking;

class GetTracking
{
    public function getActivity($tracking_code) {
        $tracking = new Tracking('CD97722D88D5ECD5', 'TUPSS370', 'H7v2v2845');
        return $tracking->track('1ZV3685E6890792737'/*$tracking_code*/);
    }
}
