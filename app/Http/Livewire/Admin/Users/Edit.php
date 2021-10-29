<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public $validated, $info;

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
        $this->validate();
        User::where('id', $this->info['id'])->update([
            'name' => $this->info['name'],
            'family' => $this->info['family'],
            'email' => $this->info['email'],
            'mobile' => $this->info['mobile'],
            'address' => $this->info['address'],
            'postal' => $this->info['postal'],
            'city' => $this->info['city'],
            'province' => $this->info['province'],
            'status' => $this->info['status']
        ]);

        return redirect()->route('admin.users.index');
    }

    public function mount($id) {
        $this->info = User::where('id', $id)->first()->toArray();
    }

    public function render()
    {
        return view('livewire.admin.users.edit')->layout('livewire.admin.master');
    }
}
