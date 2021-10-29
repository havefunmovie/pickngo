<?php

namespace App\Http\Livewire\Home\Panel\Orders\FaxingOrders;

use App\Models\OrderFaxing;
use Livewire\Component;
use Livewire\WithPagination;

class Faxing extends Component
{
    public $search = '';

    public function render()
    {
//        $this->faxs = OrderFaxing::where('user_id', auth()->user()->id)->with(['transactions', 'agent'])->get();
        return view('livewire.home.panel.orders.faxing-orders.faxing', [
//            'faxs' => OrderFaxing::where('tracking_code', 'like', '%'.$this->search.'%')->where('user_id', auth()->user()->id)
//                ->with('transaction', 'agent')->paginate(10)
        ]);
    }
}
