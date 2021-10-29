<?php

namespace App\Http\Livewire\Home\Panel\Services\PrintingContent\Printing;

use App\Models\Services;
use App\Models\Taxes;
use App\Models\Temp;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Session;
use Livewire\WithFileUploads;

class ServicesUpload extends Component
{
    use WithFileUploads;

    public $data, $service, $error;

    public $services;

    public $validated;

    public $upload = [];

    public $photo;

    public $isUp;

    public $agents;

    protected array $rules = [
        'upload.paper' => 'required',
        'upload.color' => 'required',
        'upload.count' => 'required|numeric',
        'upload.agent' => 'required',
        'photo' => 'required|mimes:jpg,jpeg,png,pdf,docx|max:1024',
    ];

    public function mount($services) {
        foreach ($services as $service) {
            if ($service['service_type'] === 'printing') {
                $this->service[] = $service;
            }
        }
        $this->services = Services::where('service_type', 'printing')->groupBy('paper_type')->get();
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
        $this->error = false;
    }

    public function save()
    {
        $this->validate();
        $percentage = Services::where('service_type', 'printing')->where('paper_type',$this->upload['paper']) ->where('color_type',$this->upload['color'])->get();
        $paper['percentage'] = $percentage[0]->service_percentage;
        $tax = Taxes::where('province' , auth()->user()->province)->get()->first();
        
        $file_name = $this->photo->getClientOriginalName();
        $file_name = md5($file_name.time());
        $this->photo->storeAs('images/uploads', $file_name, 'public_files');

        Temp::create([
            'user_id' => auth()->user()->id,
            'temp_file' => $file_name
        ]);

        $this->data['photo'] = $file_name;
        $exist = false;
        foreach ($this->service as $item) {
            if ($item['paper_type'] === $this->upload['paper'] && $item['color_type'] === $this->upload['color']) {
                $price = round(($item['price_first_page']* $tax->tax ?? 1),2);
                if ($this->upload['count'] > 1) {
                    $price += round((($this->upload['count'] - 1) * $item['price_more_page'])* $tax->tax ?? 0 ,2);
                }
                $exist = true;
                break;
            }
        }
        if (!$exist) {
            $this->error = 'This paper type and color has not set by admin yet!';
            $this->emit('alert_remove');
            return;
        }
        
        $paper['paper_type'] = $this->upload['paper'];
        $paper['paper_color'] = $this->upload['color'];
        $paper['price'] = $price;
        $paper['paper_num'] = $this->upload['count'];
        $paper['photo'] = $file_name;
        $this->data['paper'] = $paper;
        
        
        foreach ($this->agents as $ag) {
            if ($ag['id'] == $this->upload['agent']) {
                $agent['id'] = $ag['id'];
                $agent['name'] = $ag['name'];
                $agent['address'] = $ag['address'];
                $agent['phone'] = $ag['phone'];
                $agent['operator_name'] = $ag['operator_name'];
                $this->data['agent'] = $agent;
                break;
            }
        }
        
        if ($this->photo->getClientOriginalExtension() !== 'pdf') {
            $this->next();
        } else {
            $this->isUp = true;
        }
    }

    public function back()
    {
        $this->isUp = false;
        $this->photo = false;
    }

    public function next() {
        $this->emit('m_step', '1');
        $this->emit('get_service', $this->data);
    }

    public function render()
    {
        if (Session::has('color')) {
            $data = Session::get('color');
            $this->upload['color'] = $data;
            $data = Session::get('paper');
            $this->upload['paper'] = $data;
            $data = Session::get('count');
            $this->upload['count'] = $data;
            $data = Session::get('price');
            $this->upload['price'] = $data;
        }
        $validated = $this->validated;
        $this->agents = User::where('level', 'agent')->where('status', '1')->get();
        return view('livewire.home.panel.services.printing-content.printing.upload', compact('validated'));
    }
}