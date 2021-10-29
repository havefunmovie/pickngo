<?php


namespace App\Http\Livewire\Admin\Orders\Mailbox;


use App\Models\Mailboxes;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class MailboxAgentDatatable extends LivewireDatatable
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
        ];
    }

    public function builder()
    {
        $boxes = Mailboxes::join('user_mailboxes', 'mailboxes.id', '=', 'user_mailboxes.box_id')
            ->join('mailbox_types', 'user_mailboxes.mailbox_type_id', '=', 'mailbox_types.id')
            ->groupBy('mailboxes.id');
            $boxes = $boxes->with('boxType')->with('user')->where('is_temp', 0)->where('level' , 'agent');
//        dd($boxes);
        return $boxes;
    }
}