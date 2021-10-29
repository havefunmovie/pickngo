<?php

namespace App\Http\Livewire\Admin\Agent\Payment;

use App\Models\PaymentInfo;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class PaymentInfoDatatable extends LivewireDatatable
{
    public function columns()
    {
        return [
            Column::name('name_of_card')->label('Name')->searchable(),
            Column::name('credit_card')->label('Credit Card')->searchable(),
            Column::name('cvd_code')->label('CVD')->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.admin.agent.payment.table-actions', ['id' => $id]);
            })
        ];
    }

    public function builder()
    {
        return PaymentInfo::where('user_id', auth()->user()->id);
    }

    public function deleteByMe($id) {
//        $p_info = Orderp_info::where('id', $id)->get()->toArray();
//        $p_info = array_shift($p_info);
//        $this->dispatchBrowserEvent('p_info-detail', $p_info);
    }

    public function showByMe($id) {
        $p_info = PaymentInfo::where('id', $id)->get()->toArray();
        $p_info = array_shift($p_info);
        $this->dispatchBrowserEvent('p-info-detail', $p_info);
    }
}