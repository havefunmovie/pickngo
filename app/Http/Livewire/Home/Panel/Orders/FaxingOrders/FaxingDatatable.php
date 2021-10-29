<?php


namespace App\Http\Livewire\Home\Panel\Orders\FaxingOrders;

use App\Http\Livewire\Home\Panel\Orders\GetTracking;
use App\Models\OrderFaxing;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class FaxingDatatable extends LivewireDatatable
{
    public $model = OrderFaxing::class;

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
            Column::callback(['id'], function ($id) {
                return view('livewire.home.panel.orders.faxing-orders.table-actions', ['id' => $id]);
            })
        ];
    }

    public function builder()
    {
        $agent = OrderFaxing::where('order_faxing.user_id', auth()->user()->id);
        return $agent;
    }

    public function faxing_detail($id) {
        $faxs = OrderFaxing::where('id', $id)->where('user_id', auth()->user()->id)->with(['transactions', 'agent'])->get()->first()->toArray();
        if ($faxs) {
            $this->dispatchBrowserEvent('faxing-detail', $faxs);
        }
    }

    public function printing($id) {
        $this->dispatchBrowserEvent('faxing-print-info',$id);
    }
}