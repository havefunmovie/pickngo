<?php


namespace App\Http\Livewire\Home\Panel\Orders\EnvelopOrders;

use App\Http\Livewire\Home\Panel\Orders\GetTracking;
use App\Models\OrderEnvelop;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Ups\Tracking;

class EnvelopDatatable extends LivewireDatatable
{
    public $model = OrderEnvelop::class;

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
                return view('livewire.home.panel.orders.envelop-orders.table-actions', ['id' => $id]);
            })
        ];
    }

    public function builder()
    {
        $agent = OrderEnvelop::where('order_envelop.user_id', auth()->user()->id);
        return $agent;
    }

    public function followUp($id) {
        $envelop = OrderEnvelop::where('id', $id)->where('user_id', auth()->user()->id)->get()->first()->toArray();
        try {
            $tracking = new GetTracking();
            $this->dispatchBrowserEvent('envelop-activity-detail', $tracking->getActivity($envelop['tracking_code'])->Package->Activity);
        } catch (\Exception $e) {
            $this->emit('set_error', $e->getMessage());
            $this->emit('alert_remove');
        }
    }

    public function detail($id) {
        $envelop = OrderEnvelop::where('id', $id)->where('user_id', auth()->user()->id)->with('transactions')->get()->first()->toArray();
        if ($envelop) {
            $this->dispatchBrowserEvent('envelop-detail', $envelop);
        }
    }

    public function reship($id) {
        session()->flash('reship', $id);
        return redirect()->route('home.services.envelop');
    }

    public function printing($id) {
        $envelop = OrderEnvelop::where('id', $id)->where('user_id', auth()->user()->id)->with('transactions')->get()->first()->toArray();
        if ($envelop) {
            $this->emit('setEnvelopDetails',$envelop);
            $this->dispatchBrowserEvent('envelop_print-info',$envelop);
        }
    }
}