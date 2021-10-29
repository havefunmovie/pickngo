<?php


namespace App\Http\Livewire\Admin\AgentsOwner;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class AgentsOwnerDatatable extends LivewireDatatable
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
            Column::name('agent.name')->label('Agent')->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.admin.agents-owner.table-actions', ['id' => $id]);
            })
        ];
    }

    public function builder()
    {
        return User::where('users.level', 'agent')->with('agent');
    }

    public function showByMe($id) {
        $user = User::where('id', $id)->with('agent')->get()->toArray();
        $user = array_shift($user);
        $this->dispatchBrowserEvent('agent-detail', $user);
    }
}