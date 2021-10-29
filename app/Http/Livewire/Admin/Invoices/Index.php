<?php

namespace App\Http\Livewire\Admin\Invoices;

use App\Models\Invoices;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
//    use WithPagination;
//    public $searchTerm;

    public function mount() {
//        $allTrans = Transactions::whereNotNull('agent_id')
//            ->where('system_check', '0')
//            ->groupBy('agent_id')
//            ->selectRaw('*, sum(price) as m_price, max(id) as max_id, min(id) as min_id')
//            ->get();
//
//        Transactions::where('system_check', '0')->update([
//            'system_check' => '0'
//        ]);
//        $data = [];
//        $i = 1;
//        foreach ($allTrans as $trans) {
//            $mdata = [
//                [
//                    'start_transaction_id' => $trans->min_id,
//                    'end_transaction_id'   => $trans->max_id,
//                    'invoice_number'       => date('Ymd-His').'-'.mt_rand(10, 99).$i++,
//                    'agent_id'             => $trans->agent_id,
//                    'balance_value'        => $trans->m_price,
//                    'created_at'           => now(),
//                    'updated_at'           => now(),
//                ]
//            ];
//            array_push($data, array_shift($mdata));
//        }
//
//        Invoices::insert($data);
//
//        $invs = Invoices::whereBetween('created_at', [Carbon::now()->subMinute(3), Carbon::now()->subMinute()])
//            ->get();
//
//        foreach ($invs as $inv) {
//            if ($inv->balance_value <= -200) {
//                User::where('id', $inv->agent_id)->update([
////                    'status' => '0'
//                ]);
//            }
//        }
//
//        dd(Carbon::now()->subMinute(3) . ' ' . Carbon::now()->subMinutes() . ' ' . $invs);
    }

    public function render()
    {
//        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.admin.invoices.index', [
//            'trans' => Transactions::whereNotNull('agent_id')->groupBy('agent_id')->selectRaw('*, sum(price) as m_price')->with('agent')
//                ->whereHas('agent', function($q) use($searchTerm) {
//                    $q->where('name', 'like', '%' . $searchTerm . '%');
//                })->paginate(10)
        ])->layout('livewire.admin.master');
    }
}
