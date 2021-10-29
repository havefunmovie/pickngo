<?php


namespace App\Http\Livewire\Admin\Settings\ApiKey;


use App\Models\AgentService;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class ApiDatatable extends LivewireDatatable
{
    public $model = AgentService::class;

    public function columns()
    {
        return [
            Column::name('access_key')->label('Access Key')->searchable(),
            Column::name('username')->label('Username')->searchable(),
            Column::name('password')->label('Password')->searchable(),
            Column::name('account_number')->label('Account Number')->searchable(),
            Column::name('name')->label('Agent')->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.admin.settings.api-key.table-actions', ['id' => $id]);
            })
        ];
    }

    public function deleteByMe($id) {

    }
}