<?php


namespace App\Http\Livewire\Admin\Agent\Mailbox;


use App\Models\MailboxTypes;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class BoxTypesDatatable extends LivewireDatatable
{
    public function columns()
    {
        return [
            Column::name('box_type')->label('Box Type')->searchable(),
            Column::name('price')->label('Price'),
            Column::callback(['expired_time', 'expired_type'], function ($time, $type) {
                return $time . ' - ' . $type;
            })->label('Time')->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.admin.agent.mailbox.box-type-table-actions', ['id' => $id]);
            })
        ];
    }

    public function builder()
    {
        return MailboxTypes::where('mailbox_types.agent_id', auth()->user()->id);
    }

    public function deleteByMe() {

    }
}