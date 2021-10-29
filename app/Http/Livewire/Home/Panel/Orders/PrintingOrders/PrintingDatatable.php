<?php


namespace App\Http\Livewire\Home\Panel\Orders\PrintingOrders;

use App\Models\OrderPrinting;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class PrintingDatatable extends LivewireDatatable
{
    public $model = OrderPrinting::class;

    public function columns()
    {
        return [
            DateColumn::name('created_at')->label('Date')->searchable(),
            Column::name('tracking_code')->label('Tracking Code')->searchable(),
            Column::name('agent.name')->label('Agent'),
            Column::callback(['transactions.status'], function ($status) {
                return $status === 'successful'
                    ? '<span class="text-green-500">Successful</span>'
                    : ($status === 'pending' ? '<span class="text-yellow-500">Pending</span>' : '<span class="text-red-500">Unsuccessful</span>');
            })->label('Status'),
            Column::name('transactions.price')->label('Price'),
            Column::callback(['id', 'uploaded_file'], function ($id, $uploaded_file) {
                return view('livewire.home.panel.orders.printing-orders.table-actions', ['id' => $id, 'uploaded_file' => $uploaded_file]);
            })
        ];
    }

    public function builder()
    {
        $agent = OrderPrinting::where('order_printing.user_id', auth()->user()->id);
        return $agent;
    }

    public function printing_detail($id) {
        $print = OrderPrinting::where('id', $id)->where('user_id', auth()->user()->id)->with(['transactions', 'agent'])->get()->first()->toArray();
        if ($print) {
            $this->dispatchBrowserEvent('printing-detail', $print);
        }
    }

    public function printing($id) {
        $this->dispatchBrowserEvent('printing-print-info',$id);
    }
}