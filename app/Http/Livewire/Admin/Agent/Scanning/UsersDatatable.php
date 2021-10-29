<?php

namespace App\Http\Livewire\Admin\Agent\Scanning;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class UsersDatatable extends LivewireDatatable
{
    public $model = User::class;
    public function columns()
    {
        return [
            Column::callback(['name', 'family'], function ($name, $family) {
                return $name.' '.$family;
            })->label('name')->searchable(),
            Column::name('email')->label('Email')->searchable(),
            Column::name('mobile')->label('Phone')->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.admin.agent.scanning.users-table-actions', ['id' => $id]);
            })
        ];
    }

    public function builder()
    {
        return User::where('users.level', null)->where('users.agent_id',auth()->user()->id)->orderBy('updated_at', 'desc');
    }


    public function AddNew($id) {
        session()->flash('newScanningForExistingUser', $id);
        return redirect()->route('agent.scanning.create');
    }

    public function showByMe($id) {
        $user = User::where('id', $id)->get()->toArray();
        $user = array_shift($user);
        $this->dispatchBrowserEvent('user-detail', $user);
    }
}