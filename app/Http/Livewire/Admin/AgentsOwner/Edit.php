<?php

namespace App\Http\Livewire\Admin\AgentsOwner;

use App\Models\Agent;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public $validated, $info;

    public function rules()
    {
        return [
            'info.name' => 'required',
            'info.agent_id' => 'required',
            'info.email' => 'required|email|unique:users,email,' . $this->info['id'],
            'info.mobile' => 'required|numeric|unique:users,mobile,' . $this->info['id'],
    //        'info.password' => 'required|min:8',
    //        'info.password_confirmation' => 'required|min:8|same:info.password',
            'info.address' => 'required',
            'info.postal' => 'required',
            'info.city' => 'required',
            'info.province' => 'required',
            'info.status' => 'required',
            'info.fax' => 'required|numeric',
            'info.operator_name' => 'required'
        ];
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function create() {
        $this->validate();
        User::where('id', $this->info['id'])->update([
            'agent_id' => $this->info['agent_id'],
            'name' => $this->info['name'],
            'email' => $this->info['email'],
            'mobile' => $this->info['mobile'],
            'address' => $this->info['address'],
//            'level' => 'agent',
            'postal' => $this->info['postal'],
            'city' => $this->info['city'],
            'province' => $this->info['province'],
            'status' => $this->info['status'],
//            'password' => bcrypt($this->info["password"]),
            'fax' => $this->info['fax'],
            'operator_name' => $this->info["operator_name"]
        ]);

        return redirect()->route('admin.owner.index');
    }

    public function mount($id) {
        $this->info = User::where('id', $id)->get()->first()->toArray();
    }

    public function render()
    {
        $agents = Agent::all();
        return view('livewire.admin.agents-owner.edit', compact('agents'))->layout('livewire.admin.master');
    }
}
