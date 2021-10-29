<?php


namespace App\Http\Livewire\Home\Panel\Orders\ParcelOrders;

use App\Http\Livewire\Home\Panel\Orders\GetTracking;
use App\Models\OrderParcel;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ParcelDatatable extends LivewireDatatable
{
    public $model = OrderParcel::class;

    public function columns()
    {
        return [
            DateColumn::name('created_at')->label('Date')->searchable(),
            Column::name('tracking_code')->label('Tracking Code')->searchable(),
            Column::callback(['transactions.status'], function ($status) {
                return $status === 'successful'
                    ? '<span class="text-green-500">Successful</span>'
                    : ($status === 'pending' ? '<span class="text-yellow-500">Pending</span>' : '<span class="text-red-500">Unsuccessful</span>');
            })->label('Status'),
            Column::name('service_name')->label('Service'),
            Column::name('transactions.price')->label('Price'),
            Column::callback(['id', 'tracking_code'], function ($id) {
                return view('livewire.home.panel.orders.parcel-orders.table-actions', ['id' => $id]);
            })
        ];
    }

    public function builder()
    {
        $parcel = OrderParcel::where('order_parcel.user_id', auth()->user()->id);
        return $parcel;
    }
    
    public function followUp($id) {
        $parce = OrderParcel::where('id', $id)->where('user_id', auth()->user()->id)->get()->first()->toArray();
        try {
            $tracking = new GetTracking();
            $this->dispatchBrowserEvent('envelop-activity-detail', $tracking->getActivity($parce['tracking_code'])->Package->Activity);
        } catch (\Exception $e) {
            $this->emit('set_error', $e->getMessage());
            $this->emit('alert_remove');
        }
    }

    public function detail($id) {
        $parcel = OrderParcel::where('id', $id)->where('user_id', auth()->user()->id)->with('transactions')->get()->first()->toArray();
        if ($parcel) {
            $this->dispatchBrowserEvent('parcel-detail', $parcel);
        }
    }

    
    public function reship($id) {
        session()->flash('reship', $id);
        return redirect()->route('home.services.parcel');
    }
    
    public function printing($id) {
        $parcel = OrderParcel::where('id', $id)->where('user_id', auth()->user()->id)->with('transactions')->get()->first()->toArray();
        if ($parcel) {
            $this->emit('setParcelDetails',$parcel);
            $this->dispatchBrowserEvent('print-detail',$id);
        }
    }
}