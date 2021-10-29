<?php

namespace App\Http\Livewire\Admin\Agents;

use App\Models\Agent;
use Livewire\Component;

class Create extends Component
{

    public $validated, $agent;

    protected array $rules = [
        'agent.name' => 'required',
        'agent.description' => 'required',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function create() {
        $this->validate();
        Agent::create([
            'name' => $this->agent['name'],
            'description' => $this->agent['description'],
        ]);

        return redirect()->route('admin.agents.index');
    }

    public function render()
    {
        return view('livewire.admin.agents.create')->layout('livewire.admin.master');
    }
}
