<?php

namespace App\Http\Livewire\Home\Panel\Services\MailboxContent\Mailbox\Details;

use Session;
use App\Models\MailboxTypes;
use App\Models\Temp;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegistrationForm extends Component
{
    use WithFileUploads;

    public $validated;
    public $reg_form;
    public $box_types;
    public $agents;
    public $key = 0;

    protected array $rules = [
        'reg_form.customer_1'      => 'required',
        'reg_form.customer_2'      => 'string',
        'reg_form.customer_3'      => 'string',
//        'reg_form.renewal_date'    => 'required|date',
        'reg_form.mailbox_type'    => 'required',
        'reg_form.mailbox_type_id' => 'required',
        'reg_form.agent'           => 'required',
        'reg_form.photo1'          => 'required|mimes:jpg,jpeg,png|max:1024',
        'reg_form.photo2'          => 'required|mimes:jpg,jpeg,png|max:1024',
    ];

    public function mount() {
        $this->agents = User::where('level', 'agent')->get();
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function next() {
        $this->validate();

        if ($this->key == 0) {
            $this->reg_form['key'] = false;
        } else {
            $this->reg_form['key'] = true;
        }

        $ext = $this->reg_form['photo1']->getClientOriginalExtension();
        $file_name = $this->reg_form['photo1']->getClientOriginalName();
        $file_name = md5($file_name.time());
        $file_name = $file_name.'.'.$ext;
        $this->reg_form['photo1']->storeAs('images/uploads', $file_name, 'public_files');
        $this->reg_form['photo1'] = $file_name;

        Temp::create([
            'user_id' => auth()->user()->id,
            'temp_file' => $file_name
        ]);

        $ext = $this->reg_form['photo2']->getClientOriginalExtension();
        $file_name = $this->reg_form['photo2']->getClientOriginalName();
        $file_name = md5($file_name.time());
        $file_name = $file_name.'.'.$ext;
        $this->reg_form['photo2']->storeAs('images/uploads', $file_name, 'public_files');
        $this->reg_form['photo2'] = $file_name;

        Temp::create([
            'user_id' => auth()->user()->id,
            'temp_file' => $file_name
        ]);

        foreach ($this->box_types as $box_type) {
            if ($box_type['id'] == $this->reg_form['mailbox_type_id']) {
                $this->reg_form['type'] = $box_type['box_type'];
                $this->reg_form['price'] = $box_type['price'];
                break;
            }
        }

        $this->emit('next_step');
        $this->emit('list_boxes', $this->reg_form);
    }

    public function render()
    {
        if(Session::has('agent')) {
            $this->reg_form['agent'] = session('agent');
            $this->reg_form['mailbox_type_id'] = session('mailbox_type_id');
            $this->reg_form['mailbox_type'] = session('usage_type');
        }

        if (isset($this->reg_form['agent'])) {
            $this->box_types = MailboxTypes::where('agent_id', $this->reg_form['agent'])->get();

//            $response = \GoogleMaps::load('geocoding')
//                ->setParam (['address' =>'santa cruz'])
//                ->get();
//            dd($response);
        }
        return view('livewire.home.panel.services.mailbox-content.mailbox.details.registration-form');
    }
}
