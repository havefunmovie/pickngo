<?php


namespace App\Http\Livewire\Home\Panel\Orders\ScanningOrders;

use App\Models\OrderScanning;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ScanningDatatable extends LivewireDatatable
{
    public $model = OrderScanning::class;

    public function columns()
    {
        return [
            DateColumn::name('created_at')->label('Date')->searchable(),
            Column::name('tracking_code')->label('Tracking Code')->searchable(),
            Column::name('agent.name')->label('Agent')->searchable(),
            Column::callback(['transactions.status'], function ($status) {
                return $status === 'successful'
                    ? '<span class="text-green-500">Successful</span>'
                    : ($status === 'pending' ? '<span class="text-yellow-500">Pending</span>' : '<span class="text-red-500">Unsuccessful</span>');
            })->label('Status'),
            Column::name('transactions.price')->label('Price'),
            Column::callback(['id'], function ($id) {
                return view('livewire.home.panel.orders.scanning-orders.table-actions', ['id' => $id]);
            })
        ];
    }

    public function builder()
    {
        $agent = OrderScanning::where('order_scanning.user_id', auth()->user()->id);
        return $agent;
    }

    public function detail($id) {
        $scan = OrderScanning::where('id', $id)->where('user_id', auth()->user()->id)->with(['transactions', 'agent'])->get()->first();
        if ($scan) {
            $this->dispatchBrowserEvent('scann-detail', $scan);
        }
    }

    public function reship($id) {
        session()->flash('reship', $id);
        return redirect()->route('home.services.scanning');
    }
    
    public function printing($id) {
        $this->dispatchBrowserEvent('Scaning-print-info',$id);
    }
}