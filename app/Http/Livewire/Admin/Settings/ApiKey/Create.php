<?php

namespace App\Http\Livewire\Admin\Settings\ApiKey;

use App\Models\AgentService;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public $validated, $info;

    public function rules()
    {
        return [
            'info.access_key' => 'required',
            'info.username' => 'required',
            'info.account_number' => 'required',
            'info.agent_id' => 'required',
            'info.password' => 'required'
        ];
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function mount($id) {
//        if (AgentService::where('agent_id', auth()->user()->id)->exists()) {
            $this->info = AgentService::where('id', $id)->get()->first();
//            $this->info = array_shift($this->info);
//        }
    }

    public function edit() {
        $this->validate();
        $user = User::where('id', $this->info['agent_id'])->get()->first();
        $matchThese = ['agent_id' => $this->info['agent_id']];
        AgentService::updateOrCreate($matchThese,[
            'access_key'     => $this->info['access_key'],
            'username'       => $this->info['username'],
            'password'       => $this->info['password'],
            'account_number' => $this->info['account_number'],
            'agent_id'       => $this->info['agent_id'],
            'name'           => $user['email']
        ]);
        return redirect()->route('admin.settings.api-key.index');
    }

    public function render()
    {
        $validated = $this->validated;
        $agents = User::where('level', '!=' , null)->get();
        return view('livewire.admin.settings.api-key.create', compact('validated', 'agents'))->layout('livewire.admin.master');
    }
}
