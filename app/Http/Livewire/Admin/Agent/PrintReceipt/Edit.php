<?php

namespace App\Http\Livewire\Admin\Agent\PrintReceipt;

use App\Events\NewDropoffAcceptedByAgentEvent;
use App\Models\Receipt;
use App\Models\User;
use Livewire\Component;
use Storage;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $dropoff_id,$name,$email,$phone,$tracking_number,$agent,$prof_receipt,$tracking_numbers;
    public $data, $country, $province, $price ,$note, $dropoff_agent_id;

    protected function rules()
    {
        return [
            // 'email'     => 'sometimes|email',
            'phone'    => 'sometimes',
            'agent'  => 'sometimes',
            'country'  => 'required',
            'province'  => 'sometimes',
            'note'  => 'sometimes',
            'price'  => 'required',
            'prof_receipt' => ['sometimes']
        ];
    }

    public function update()
    {
        $validated = $this->validate();
        $validated['dropoff_agent_id'] = $validated['agent'];
        if($validated['prof_receipt'] || $validated['prof_receipt'])
        {
            $status = 'Done';
        }
        else
            $status = 'Pending';
        if($validated['prof_receipt'])
        {
            $imageName = $validated['prof_receipt']->store('images/prof-images','public_files');
        }
        else
            $imageName = null;
         
        Receipt::where('id' , $this->dropoff_id)->update([
            // 'email' => $validated['email'],
            'country' => $validated['country'],
            'province' => $validated['province'],
            'price' => $validated['price'],
            'note' => $validated['note'],
            'dropoff_agent_id' => $validated['dropoff_agent_id'],
            'prof_receipt' => $imageName,
            'status' => $status,
        ]);
        return redirect('agent/print-receipt');
    }
    public function mount($id)
    {
        $dropoff = Receipt::where('id',$id)->first();
        $this->dropoff_id = $id;
        $this->name = $dropoff->name;
        // $this->email = $dropoff->email;
        // $this->phone = $dropoff->phone;
        $this->tracking_numbers = $dropoff->tracking_number;
        $this->price = $dropoff->price;
        $this->country = $dropoff->country;
        $this->province = $dropoff->province;
        $this->note = $dropoff->note;
    }
    public function render()
    {
        $agents = User::where('level','agent')->where('id', '!=' ,auth()->user()->id)->get();
        return view('livewire.admin.agent.print-recipt.edit',compact('agents'))->layout('livewire.admin.master');
    }
}