<?php

namespace App\Http\Livewire\Home\Panel\Orders\MailboxOrders;

use App\Http\Livewire\Admin\Agent\GenerateTrackingNumber;
use App\Http\Livewire\PaypalEnvironment;
use App\Models\Transactions;
use App\Models\UserMailboxes;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class MailboxDatatable extends LivewireDatatable
{
    public $model = UserMailboxes::class;
    public function columns()
    {
        return [
            DateColumn::name('created_at')->label('Date')->searchable(),
            Column::name('tracking_code')->label('Tracking Code')->searchable(),
            DateColumn::name('renewal_date')->label('Renewal Date'),
            Column::callback(['boxtype.box_type', 'boxtype.expired_time', 'boxtype.expired_type'], function ($box, $time, $type) {
                return ucwords($box . ' - ' . $time . ' - ' . $type);
            })->label('Box Type'),
            Column::callback(['transactions.status'], function ($status) {
                return $status === 'successful' || $status === ''
                    ? '<span class="text-green-500">Verified</span>'
                    : ($status === 'pending' ? '<span class="text-yellow-500">Pending</span>' : '<span class="text-red-500">Unsuccessful</span>');
            })->label('Status'),
            Column::callback(['id', 'mailbox_status'], function ($id, $status) {
                return view('livewire.home.panel.orders.mailbox-orders.table-actions', ['id' => $id, 'status' => $status]);
            })
        ];
    }

    public function builder()
    {
        return UserMailboxes::where('user_mailboxes.user_id', auth()->user()->id)->with(['boxtype', 'box', 'transactions'])->groupBy('user_mailboxes.tracking_code');
    }

    public function recharge($id) {
        $trans = Transactions::where('user_mailbox_id', $id)->get()->first();
//        $box = UserMailboxes::where('id', $id)->get()->first();

        $paypal = new PaypalEnvironment();
        $result = $paypal->createNewOrder('CAD', $trans['price'], 'home.services.mailbox');

        Transactions::create([
            'trans_code' => $result->id,
            'price' => $trans['price'],
            'status' => 'pending',
            'payed_by' => 'paypal',
            'user_mailbox_id' => $id,
            'user_id' => auth()->user()->id,
            'agent_id' => $trans['agent_id'],
        ]);

        foreach ($result->links as $link) {
            if ($link->rel === 'approve') {
                return redirect($link->href);
            }
        }
    }


    public function mailbox_detail($id) {
        $mailbox = UserMailboxes::where('id', $id)->where('user_id', auth()->user()->id)->with(['transactions','box' , 'boxtype'])->get()->first()->toArray();
        if ($mailbox) {
            $this->dispatchBrowserEvent('mailbox-detail', $mailbox);
        }
    }
}


