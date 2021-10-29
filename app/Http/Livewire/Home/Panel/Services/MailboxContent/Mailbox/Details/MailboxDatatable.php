<?php


namespace App\Http\Livewire\Home\Panel\Services\MailboxContent\Mailbox\Details;


use App\Models\Mailboxes;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class MailboxDatatable extends LivewireDatatable
{
//    public $model = Mailboxes::class;

    public $data;

    public function columns()
    {
        return [
            NumberColumn::name('number')->label('Box Number')->searchable(),
            Column::callback(['is_empty'], function ($status) {
                return $status === '1'
                    ? '<span class="text-green-500"><i class="mdi mdi-check"></i></span>'
                    : '<span class="text-red-500"><i class="mdi mdi-close"></i></span>';
            })->label('Empty Status')->searchable(),
            Column::callback(['id'], function ($id) {
                return '$'.$this->data['price'];
            })->label('Price'),
            Column::callback(['is_temp'], function ($id) {
                return $this->data['type'];
            })->label('Box Type'),
        ];
    }

    public function builder()
    {
        return Mailboxes::where('agent_id', $this->data['agent'])->where('is_temp', 0)->where('is_empty', 1);
    }
}