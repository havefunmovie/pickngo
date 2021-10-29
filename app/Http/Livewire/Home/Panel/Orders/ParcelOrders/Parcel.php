<?php

namespace App\Http\Livewire\Home\Panel\Orders\ParcelOrders;

use App\Models\AgentService;
use App\Models\OrderParcel;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;
use Ups\Tracking;

class Parcel extends Component
{
    public $error,$parcel;

    protected $listeners = [
        'set_error' => 'setError',
        'setParcelDetails' => 'setParcelDetails',
    ];

    public function setParcelDetails($parcel)
    {
        $this->parcel = $parcel;
    }

    public function printLabel()
    {
        Session::flash('history_type', 'parcel');
        Session::flash('history_id', $this->parcel['id']);
        return redirect('/print-label');
    }
    
    public function printShipment()
    {
        Session::flash('history_type', 'parcel');
        Session::flash('history_shipment_id', $this->parcel['id']);
        return redirect('/print-shipment');
    }

    public function printInvoice()
    {
        Session::flash('history_type', 'parcel');
        Session::flash('history_invoice_id', $this->parcel['id']);
        return redirect('/print-invoice');
    }

    public function setError($error) {
        $this->error = $error;
    }


    public function render()
    {
        return view('livewire.home.panel.orders.parcel-orders.parcel');
    }
}
