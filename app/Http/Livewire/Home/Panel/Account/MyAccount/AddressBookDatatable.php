<?php


namespace App\Http\Livewire\Home\Panel\Account\MyAccount;

use App\Models\AddressBook;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class AddressBookDatatable extends LivewireDatatable
{
    public $AddressId;
    public function columns()
    {
        return [
//            NumberColumn::name('id'),
            Column::name('country')->label('Country'),
            Column::name('province')->label('Province'),
            Column::name('city')->label('City')->searchable(),
            Column::name('line_1')->label('Address')->searchable(),
            Column::name('postal_code')->label('Postal Code')->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.home.panel.account.my-account.table-actions', ['id' => $id]);
            }),
        ];
    }

    public function builder()
    {
        return AddressBook::where('user_id', auth()->user()->id);
    }

    public function delete($id)
    {
        $this->AddressId = $id;
        $this->emit('deleteAddress', $id);
        $this->dispatchBrowserEvent('delete_address_notification');
    }
}