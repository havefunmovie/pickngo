<?php

namespace App\Http\Livewire\Admin\Agents;

use App\Models\Agent;
use Livewire\Component;

class Edit extends Component
{
    public $validated, $agent;

    public function rules()
    {
        return [
            'agent.name' => 'required',
            'agent.description' => 'required',
        ];
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function edit() {
        $this->validate();
        Agent::where('id', $this->agent['id'])->update([
            'name' => $this->agent['name'],
            'description' => $this->agent['description'],
        ]);

        return redirect()->route('admin.agents.index');
    }

    public function mount($id) {
        $this->agent = Agent::where('id', $id)->first()->toArray();
    }
    
    public function render()
    {
        return view('livewire.admin.agents.edit')->layout('livewire.admin.master');
    }
}
