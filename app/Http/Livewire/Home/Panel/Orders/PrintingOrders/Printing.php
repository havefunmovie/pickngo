<?php

namespace App\Http\Livewire\Home\Panel\Orders\PrintingOrders;

use App\Models\OrderPrinting;
use Livewire\Component;
use Livewire\WithPagination;

class Printing extends Component
{
//    use WithPagination;

    public $search = '';

//    public function updatingSearch()
//    {
//        $this->resetPage();
//    }

    public function render()
    {
        return view('livewire.home.panel.orders.printing-orders.printing');
    }

//    public function detail($id) {
//        $print = OrderPrinting::where('id', $id)->where('user_id', auth()->user()->id)->with(['transaction', 'agent'])->get()->first()->toArray();
//        if ($print) {
//            $this->dispatchBrowserEvent('print-detail', $print);
//        }
//    }
}
