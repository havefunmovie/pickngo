<?php

namespace App\Http\Livewire\Home\Panel\Orders\ScanningOrders;

use App\Models\OrderScanning;
use Livewire\Component;
use Livewire\WithPagination;

class Scanning extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.home.panel.orders.scanning-orders.scanning', [
//            'scanns' => OrderScanning::where('tracking_code', 'like', '%'.$this->search.'%')->where('user_id', auth()->user()->id)
//                ->with(['transaction', 'agent'])->paginate(10)
        ]);
    }

    public function detail($id) {
        $scanns = OrderScanning::where('id', $id)->where('user_id', auth()->user()->id)->with(['transaction', 'agent'])->get()->first()->toArray();
        if ($scanns) {
            $this->dispatchBrowserEvent('scanns-detail', $scanns);
        }
    }
}
