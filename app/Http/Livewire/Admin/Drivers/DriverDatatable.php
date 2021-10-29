<?php


namespace App\Http\Livewire\Admin\Drivers;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DriverDatatable extends LivewireDatatable
{
    public $model = User::class;

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::callback(['name', 'family'], function ($name, $family) {
                return $name.' '.$family;
            })->label('name')->searchable(),
            Column::name('email')->label('Email')->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.admin.drivers.table-actions', ['id' => $id]);
            })
        ];
    }

    public function builder()
    {
        return User::where('users.level', 'driver');
    }

    public function showByMe($id) {
        $user = User::where('id', $id)->get()->toArray();
        $user = array_shift($user);
        $this->dispatchBrowserEvent('user-detail', $user);
    }

    public function editByMe($id) {
//        $user = User::where('id', $id)->get()->toArray();
//        $user = array_shift($user);
//        $this->dispatchBrowserEvent('user-detail', $user);
    }

    public function deleteByMe($id) {
//        $user = User::where('id', $id)->get()->toArray();
//        $user = array_shift($user);
//        $this->dispatchBrowserEvent('user-detail', $user);
    }
}