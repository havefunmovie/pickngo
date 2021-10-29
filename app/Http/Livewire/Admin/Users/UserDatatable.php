<?php


namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class UserDatatable extends LivewireDatatable
{
    public $model = User::class;

    public function columns()
    {
        return [
            Column::callback(['created_at'],function($created_at)
            {
                return substr($created_at,0,10)." &nbsp &nbsp ".substr($created_at,10,);
            })->label('Date'),
            Column::callback(['name', 'family'], function ($name, $family) {
                return $name.' '.$family;
            })->label('name')->searchable(),
            Column::name('email')->label('Email')->searchable(),
            Column::name('mobile')->label('Phone')->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.admin.users.table-actions', ['id' => $id]);
            })
        ];
    }

    public function builder()
    {
        return User::where('users.level', null);
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