<?php

namespace App\Http\Livewire\Admin\Agent;

use App\Models\AgentService;
use Livewire\Component;

class ApiKey extends Component
{
    public $validated, $info;

    protected array $rules = [
        'info.access_key'     => 'required',
        'info.username'       => 'required',
        'info.password'       => 'required',
        'info.account_number' => 'required',
    ];

    public function mount() {
        if (AgentService::where('agent_id', auth()->user()->id)->exists()) {
            $this->info = AgentService::where('agent_id', auth()->user()->id)->get()->toArray();
            $this->info = array_shift($this->info);
        }
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function edit() {

        $this->validate();
        $matchThese = ['agent_id' => auth()->user()->id];
        AgentService::updateOrCreate($matchThese,[
            'access_key' => $this->info['access_key'],
            'username'   => $this->info['username'],
            'password'   => $this->info['password'],
            'account_number'   => $this->info['account_number'],
            'name'       => auth()->user()->name
        ]);
        return redirect()->route('agent.index');
    }

    public function render()
    {
        $validated = $this->validated;
        return view('livewire.admin.agent.api-key', compact('validated'))->layout('livewire.admin.master');
    }
}
