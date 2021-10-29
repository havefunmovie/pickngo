<?php

namespace App\Http\Livewire\Admin\Agent;

use App\Models\AddressBook;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class AddressBookDatatable extends LivewireDatatable
{
    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('country')->label('Country'),
            Column::name('province')->label('Province'),
            Column::name('city')->label('City')->searchable(),
            Column::name('line_1')->label('Address')->searchable(),
            Column::name('postal_code')->label('Postal Code')->searchable(),
        ];
    }

    public function builder()
    {
        return AddressBook::where('user_id', auth()->user()->id);
    }
}