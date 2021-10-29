<?php

namespace App\Http\Livewire\Admin\Agent\DropOff;

use App\Events\NewDropoffAcceptedByAgentEvent;
use App\Models\Dropoff;
use App\Models\User;
use Livewire\Component;
use Storage;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $dropoff_id,$name,$email,$phone,$tracking_number,$agent,$prof_receipt,$status,$company;
    public $data;

    protected function rules()
    {
        return [
            // 'email'     => 'sometimes|email',
            'tracking_number'  => 'required',
            'status'  => 'required',
            'name'  => 'required',
            'phone'    => 'required|numeric',
            'company'  => 'required',
            'agent'  => 'sometimes',
            'prof_receipt' => ['sometimes']
        ];
    }

    public function update()
    {
        $validated = $this->validate();

        if($validated['prof_receipt'])
        {
            $imageName = $validated['prof_receipt']->store('images/prof-images','public_files');
        }
        else
            $imageName = null;
        Dropoff::where('id' , $this->dropoff_id)->update([
            // 'email' => $validated['email'],
            'tracking_number' => $validated['tracking_number'],
            'status' => $validated['status'],
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'company' => $validated['company'],
            'dropoff_agent_id' => $validated['agent'],
            'prof_receipt' => $imageName,
        ]);

        return redirect('/agent/drop-off');
    }

    public function delete()
    {
        Dropoff::where('id',$this->dropoff_id)->delete();
        return redirect('/agent/drop-off');
    }

    public function mount($id)
    {
        $dropoff = Dropoff::where('id',$id)->first();
        $this->dropoff_id = $id;
        $this->name = $dropoff->name;
        $this->email = $dropoff->email;
        $this->phone = $dropoff->phone;
        $this->status = $dropoff->status;
        $this->company = $dropoff->company;
        $this->tracking_number = $dropoff->tracking_number;
    }
    public function render()
    {
        $agents = User::where('level','agent')->where('id', '!=' ,auth()->user()->id)->get();
        return view('livewire.admin.agent.drop-off.edit',compact('agents'))->layout('livewire.admin.master');
    }
}