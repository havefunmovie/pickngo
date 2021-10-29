<?php

namespace App\Http\Livewire\Home\Panel\Orders\EnvelopOrders;

use App\Models\OrderEnvelop;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithPagination;
use Ups\Tracking;

class Envelop extends Component
{
    public $error,$envelop;

    protected $listeners = [
        'set_error' => 'setError',
        'setEnvelopDetails' => 'setEnvelopDetails',
    ];

    public function setEnvelopDetails($envelop)
    {
        $this->envelop = $envelop;
    }

    public function printLabel()
    {
        Session::flash('history_type', 'envelop');
        Session::flash('history_id', $this->envelop['id']);
        return redirect('/print-label');
    }

    public function printShipment()
    {
        Session::flash('history_type', 'envelop');
        Session::flash('history_shipment_id', $this->envelop['id']);
        return redirect('/print-shipment');
    }

    public function printInvoice()
    {
        Session::flash('history_type', 'envelop');
        Session::flash('history_invoice_id', $this->envelop['id']);
        return redirect('/print-invoice');
    }

    public function setError($error) {
        $this->error = $error;
    }

    public function render()
    {
        return view('livewire.home.panel.orders.envelop-orders.envelop', [
//            'envelops' => OrderEnvelop::where('user_id', auth()->user()->id)->with('transaction')->get(),
        ]);
    }
}
