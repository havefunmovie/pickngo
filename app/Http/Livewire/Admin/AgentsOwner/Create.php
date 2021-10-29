<?php

namespace App\Http\Livewire\Admin\AgentsOwner;

use App\Events\NewUserEvent;
use App\Models\Agent;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $validated, $info;

    protected array $rules = [
        'info.name' => 'required',
        'info.agent_id' => 'required',
        'info.email' => 'required|email|unique:users,email',
        'info.mobile' => 'required|numeric|unique:users,mobile',
        'info.address' => 'required',
        'info.postal' => 'required',
        'info.city' => 'required',
        'info.province' => 'required',
        'info.status' => 'required',
        'info.fax' => 'sometimes|numeric',
        'info.operator_name' => 'required|unique:users,operator_name',
        'info.tps' => 'required',
        'info.tvq' => 'required',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function create() {
        $this->validate();
        $newUser = User::create([
            'agent_id' => $this->info['agent_id'],
            'name' => $this->info['name'],
            'email' => $this->info['email'],
            'mobile' => $this->info['mobile'],
            'address' => $this->info['address'],
            'level' => 'agent',
            'postal' => $this->info['postal'],
            'city' => $this->info['city'],
            'province' => $this->info['province'],
            'status' => $this->info['status'],
            'password' => Hash::make('secret-password'),
            'fax' => $this->info['fax'],
            'operator_name' => $this->info["operator_name"],
            'tps' => $this->info["tps"],
            'tvq' => $this->info["tvq"],
        ]);
        // Send welcome email with new account information to customer
        Event(new NewUserEvent($newUser));
        return redirect()->route('admin.owner.index');
    }

    public function render()
    {
        $agents = Agent::all();
        return view('livewire.admin.agents-owner.create', compact('agents'))->layout('livewire.admin.master');
    }
}
