<?php

namespace App\Http\Livewire\Admin\Agent\PrintReceipt;

use App\Mail\NewDropoffAcceptedByAgentMail;
use App\Mail\ReceiptEmail;
use App\Models\Receipt;
use App\Models\Services;
use App\Models\Taxes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Session;
// use Ups\Entity\Receipt;

class Index extends Component
{
    public $name,$price,$country,$province,$tracking_number,$data,$total_price,$tax_price,$qty =0;
    public $tracking_numbers = [];
    public $userEmail,$notification;

    protected $rules = [
        'name'     => 'required|string',
        'price'     => 'required|numeric',
        'country'    => 'required',
        'province'    => 'sometimes',
        'tracking_number'  => 'sometimes',
    ];

    public function saveTrackingNumber()
    {
        $this->notification = null;
        if(in_array($this->tracking_number, $this->tracking_numbers))
        {
            $this->notification = 'this tracking number has been scanned.';
            $this->tracking_number = null;
        }
        else{
            array_push($this->tracking_numbers, $this->tracking_number); 
            $this->tracking_number = null;
            $this->qty = $this->qty +1;
        }
    }

    public function removeTrackingNumber($tracking_number)
    {
        $key = array_search($tracking_number, $this->tracking_numbers);
        unset($this->tracking_numbers[$key]);
        $this->tracking_number = null;
        $this->qty = $this->qty -1;
    }

    public function calculate()
    {
        $this->notification = null;
        if(($this->tracking_numbers == null) && ($this->tracking_number != null))
        {
            array_push($this->tracking_numbers, $this->tracking_number);
            $this->tracking_number = null;
            $this->qty = $this->qty +1;
        }

        $this->data = $this->validate();
        $this->data['agent_id'] = auth()->user()->id;
        if($this->data['province'])
        {
            $tax = Taxes::where('province',$this->data['province'])->get()->first();
            $tax = $tax->tax;
        } 
        else
            $tax = 1;
        $this->data['total_price'] = $this->total_price = round($this->data['price'] * $tax ,2);
        $this->data['tax_price'] = $this->tax_price = round(abs($this->total_price - $this->data['price']),2);
        $this->data['qty'] = $this->qty;
        $this->data['status'] = 'Pending';
        $this->data['tracking_numbers'] = $this->tracking_numbers;
    }

    public function print()
    {
        $this->notification = null;
        $this->data['agent_id'] = auth()->user()->id;
        foreach($this->data['tracking_numbers'] as $tracking_number)
        {
            Receipt::create([
                'name' => $this->data['name'],
                'tracking_number' => $tracking_number,
                'status' => $this->data['status'],
                'price' => $this->data['total_price'],
                'country' => $this->data['country'],
                'province' => $this->data['province'],
                'agent_id' => $this->data['agent_id'],
            ]);
        }
        Session::put('receipt', $this->data);
        // Event(new NewDropoffAcceptedByAgentEvent($this->data));
        return redirect('Agent/receipt');
    }

    public function email(){
        $this->notification = 'Email Sent !';
        Mail::to($this->userEmail)->send(new ReceiptEmail($this->data)); 
    }

    public function render()
    {
        $provinces = Taxes::all();
        return view('livewire.admin.agent.print-recipt.index', compact('provinces'))->layout('livewire.admin.master');
    }
}