<?php

namespace App\Http\Livewire\Admin\Agent\Mailbox;

use App\Models\Mailboxes;
use App\Models\MailboxPrices;
use App\Models\UserMailboxes;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class MailboxDatatable extends LivewireDatatable
{
    public function columns()
    {
        return [
            NumberColumn::name('mailboxes.number')->label('Box Number')->searchable(),
            Column::callback(['mailbox_types.box_type', 'mailbox_types.expired_time', 'mailbox_types.expired_type'], function ($box, $time, $type) {
                return ucwords($box . ' - ' . $time . ' - ' . $type);
            })->label('Box Type')->searchable(),
            Column::name('userMailbox.user.mobile')->label('Customer Phone')->searchable(),
            Column::name('userMailbox.user.email')->label('Customer Email')->searchable(),
            DateColumn::name('user_mailboxes.renewal_date')->label('Renewal Date'),
            Column::callback(['user_mailboxes.confirm_status'], function ($status) {
                return $status == 1 ? 'Confirmed' : ($status == 0 ? 'New Resquest' : 'Rejected') ;
            })->label('Status')->searchable(),
            Column::callback(['user_mailboxes.key_status'], function ($status) {
                return $status == 1
                    ? '<span class="text-green-500"><i class="mdi mdi-check"></i></span>'
                    : '<span class="text-red-500"><i class="mdi mdi-close"></i></span>';
            })->label('Key Status')->searchable(),
            Column::callback(['id', 'user_mailboxes.mailbox_status'], function ($id, $status) {
                return view('livewire.admin.agent.mailbox.confirm-table-actions', ['id' => $id, 'status' => $status]);
            })
        ];
    }

    public function builder()
    {
        $boxes = Mailboxes::join('user_mailboxes', 'mailboxes.id', '=', 'user_mailboxes.box_id')
            ->join('mailbox_types', 'user_mailboxes.mailbox_type_id', '=', 'mailbox_types.id')
            ->groupBy('mailboxes.id');
        $boxes = $boxes->where('mailboxes.agent_id', auth()->user()->id)->where('is_temp', 0)->with('boxType');
//        dd($boxes);
        return $boxes;
    }

    public function showByMe($id) {
        $mailbox = UserMailboxes::where('box_id', $id)->with(['user', 'box', 'boxtype'])->get()->first();
        $prices = MailboxPrices::where('agent_id', auth()->user()->id)->get()->first();
        $mailbox['prices'] = $prices;
        $mailbox['photo1'] = asset('images/uploads').'/'.$mailbox['photo1'];
        $mailbox['photo2'] = asset('images/uploads').'/'.$mailbox['photo2'];
        $date = new \DateTime($mailbox['renewal_date']);
        $mailbox['renewal_date'] = $date->format('d/m/Y');
        $this->dispatchBrowserEvent('box-detail', $mailbox);
    }
}