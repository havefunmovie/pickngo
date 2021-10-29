<?php


namespace App\Http\Livewire\Admin\Agents;


use App\Models\Agent;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class AgentsDatatable extends LivewireDatatable
{
    public $model = Agent::class;

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('name')->label('name')->searchable(),
            Column::name('description')->label('description')->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.admin.agents.table-actions', ['id' => $id]);
            })
        ];
    }
}