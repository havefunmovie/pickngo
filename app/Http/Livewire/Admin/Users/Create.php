<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public $validated, $info;

    protected array $rules = [
        'info.name' => 'required',
        'info.family' => 'required',
        'info.email' => 'required|email|unique:users,email',
        'info.mobile' => 'required|numeric|unique:users,mobile',
        'info.password' => 'required|min:8',
        'info.password_confirmation' => 'required|min:8|same:info.password',
        'info.address' => 'required',
        'info.postal' => 'required',
        'info.city' => 'required',
        'info.province' => 'required',
        'info.status' => 'required'
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function create() {
        $this->validate();
        User::create([
            'name' => $this->info['name'],
            'family' => $this->info['family'],
            'email' => $this->info['email'],
            'mobile' => $this->info['mobile'],
            'address' => $this->info['address'],
            'postal' => $this->info['postal'],
            'city' => $this->info['city'],
            'province' => $this->info['province'],
            'status' => $this->info['status'],
            'password' => bcrypt($this->info["password"])
        ]);

        return redirect()->route('admin.users.index');
    }

    public function render()
    {
        return view('livewire.admin.users.create')->layout('livewire.admin.master');
    }
}
