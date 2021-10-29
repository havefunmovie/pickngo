<?php

namespace App\Http\Livewire\Admin\Agent\Users;

use App\Events\RequestUserInfo;
use App\Models\User;
use Livewire\Component;


class Index extends Component
{
    public $user_info,$users,$notification_content;
    public $show = false;
    public $notification = null;

    public function search_user()
    {   if($this->user_info)
        {
            $this->users = User::Where('mobile',$this->user_info)->orWhere('email',$this->user_info)->get();
            if(count($this->users)>0)
            {
                $this->show = true;
                $this->notification = null;
            }
            else
            {
                $this->notification = 'sent';
                $this->notification_content = 'Oops! We can not find this user';
            }  
        }
    }

    public function accessToUserInfo(User $user, User $agent)
    {
        $this->notification = 'sent';
        $this->notification_content = 'Request Send to User.';
        Event(new RequestUserInfo($user,$agent));
        $this->show = false;
    }

    public function updateUserAgent($agent_id ,User $user)
    {
        $user->update(['agent_id'=>$agent_id]);
        return redirect()->to('/request-accepted');
    }

    public function render()
    {
        return view('livewire.admin.agent.users.index')->layout('livewire.admin.master');
    }
}
