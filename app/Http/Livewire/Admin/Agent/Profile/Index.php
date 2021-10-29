<?php

namespace App\Http\Livewire\Admin\Agent\Profile;

use App\Models\AgentService;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $agent, $access_info;

    public function render()
    {
        return view('livewire.admin.agent.profile.index')->layout('livewire.admin.master');
    }

    public function mount()
    {
        $this->agent = User::where('id',auth()->user()->id)->first();
        $this->access_info = AgentService::where('agent_id',auth()->user()->id)->first();
    }
}
