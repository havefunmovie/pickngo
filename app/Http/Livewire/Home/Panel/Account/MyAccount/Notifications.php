<?php

namespace App\Http\Livewire\Home\Panel\Account\MyAccount;

use App\Models\OrderFaxing;
use App\Models\OrderPrinting;
use App\Models\OrderScanning;
use App\Models\User;
use Livewire\Component;

class Notifications extends Component
{
    public $validated,$user,$agents,$agent,$orderId,$orderType,$notificationId;

    protected function rules()
    {
        return ['agent'       => 'required',];
    }
    public function selectNewAgent()
    {
        $agent = $this->validate();

        switch ($this->orderType) {
            case 'Faxing':
                OrderFaxing::where('id',$this->orderId)->update([
                    'agent_id' => $agent['agent'],
                    'reject_reason_message' => null,
                    'agent_accept_status' => null
                ]);
                break;
            case 'Printing':
                OrderPrinting::where('id',$this->orderId)->update([
                    'agent_id' => $agent['agent'],
                    'reject_reason_message' => null,
                    'agent_accept_status' => null
                ]);
                break;
            case 'Scanning':
                OrderScanning::where('id',$this->orderId)->update([
                    'agent_id' => $agent['agent'],
                    'reject_reason_message' => null,
                    'agent_accept_status' => null
                ]);
                break;
        }
       
        auth()->user()->unreadNotifications->where('id' , $this->notificationId)->markAsRead();
        return redirect('/account/notifications');

        
    }

    public function markAsRead($id)
    {
        auth()->user()->unreadNotifications->where('id' , $id)->markAsRead();
        return redirect('/account/notifications');
    }

    public function setOrderId($id,$type,$notificationId)
    {
        $this->orderId = $id;
        $this->orderType = $type;
        $this->notificationId = $notificationId;
    }

    public function mount()
    {
        $this->user = User::where('id', auth()->user()->id)->with('notifications')->get()->first();
        $this->agents = User::where('level','agent')->get();
    }
    public function render()
    {
        return view('livewire.home.panel.account.my-account.notifications');
    }
}