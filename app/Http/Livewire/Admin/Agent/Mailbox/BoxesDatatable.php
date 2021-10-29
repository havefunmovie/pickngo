<?php

namespace App\Http\Livewire\Admin\Agent\Mailbox;

use App\Models\Mailboxes;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class BoxesDatatable extends LivewireDatatable
{
    public function columns()
    {
        return [
            NumberColumn::name('number')->label('Box Number')->searchable(),
            Column::callback(['is_empty'], function ($status) {
                return $status === '1'
                    ? '<span class="text-green-500"><i class="mdi mdi-check"></i></span>'
                    : '<span class="text-red-500"><i class="mdi mdi-close"></i></span>';
            })->label('Empty Status')->searchable(),
            Column::callback(['id', 'is_empty'], function ($id, $empty) {
                return view('livewire.admin.agent.mailbox.table-actions', ['id' => $id, 'empty' => $empty]);
            })
        ];
    }

    public function builder()
    {
        return Mailboxes::where('mailboxes.agent_id', auth()->user()->id);
    }
}