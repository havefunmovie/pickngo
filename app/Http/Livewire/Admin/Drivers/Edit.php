<?php

namespace App\Http\Livewire\Admin\drivers;

use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public $validated, $info ,$name;

    public function rules()
    {
        return [
            'info.name' => 'required',
            'info.family' => 'required',
            'info.email' => 'required|email|unique:users,email,' . $this->info['id'],
            'info.mobile' => 'required|numeric|unique:users,mobile,' . $this->info['id'],
            'info.address' => 'required',
            'info.postal' => 'required',
            'info.city' => 'required',
            'info.province' => 'required',
            'info.status' => 'required'
        ];
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function edit() {
        $validated = $this->validate();
        User::where('id', $this->info['id'])->update($validated['info']);

        return redirect()->route('admin.drivers.index');
    }

    public function mount($id) {
        $this->info = User::where('id', $id)->first()->toArray();
    }

    public function render()
    {
        return view('livewire.admin.drivers.edit')->layout('livewire.admin.master');
    }
}
