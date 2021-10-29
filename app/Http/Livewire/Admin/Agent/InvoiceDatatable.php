<?php

namespace App\Http\Livewire\Admin\Agent;

use App\Models\Invoices;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use phpDocumentor\Reflection\Types\This;

class InvoiceDatatable extends LivewireDatatable
{
    public $model = Invoices::class;

    public $checked = 0;

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('invoice_number')->label('Number')->searchable(),
            Column::callback(['balance_value'], function ($balance) {
                return $balance < 0
                    ? '<span class="text-red-500">-$' . (-1) * $balance . '</span>'
                    : '<span class="text-green-500">+$' . $balance . '</span>';
            })->label('Balance')->searchable(),
            DateColumn::name('created_at')->label('Date')->searchable(),
            Column::callback(['id', 'balance_value'], function ($id, $balance) {
                return view('livewire.admin.agent.invoice-table-actions', ['id' => $id, 'balance' => $balance, 'checked' => ++$this->checked]);
            })
        ];
    }

    public function builder()
    {
        $invs = Invoices::where('agent_id', auth()->user()->id)->orderBy('id', 'DESC');
//        $invs = DB::table('invoices')->select(['invoices.id', 'invoices.invoice_number', 'invoices.balance_value', 'invoices.created_at',
//            DB::raw('MAX(invoices.id) AS max_id')])
//            ->where('agent_id', auth()->user()->id)
//            ->groupBy('invoices.id')
//            ->get();

//        $invs = Invoices::where('agent_id', auth()->user()->id)
//            ->groupBy('id')
//            ->selectRaw('*, max(id) as max_id')
//            ->get();

//        dd($invs);
        return $invs;
    }

    public function cash($id) {
//        $cash = Invoices::where('id', $id)->get()->toArray();
//        $cash = array_shift($cash);
        $this->checked = 0;
        $this->dispatchBrowserEvent('cash-detail', $id);
    }

    public function print($id) {
        return redirect()->route('agent.invoice-list', $id);
    }
}