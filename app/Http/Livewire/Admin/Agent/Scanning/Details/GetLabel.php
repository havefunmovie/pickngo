<?php

namespace App\Http\Livewire\Admin\Agent\Scanning\Details;

use App\Http\Livewire\Admin\Agent\GenerateTrackingNumber;
use App\Events\NewUserEvent;
use App\Models\Transactions;
use Session;
use App\Models\AddressBook;
use App\Models\OrderEnvelop;
use App\Models\OrderScanning;
use App\Models\Services;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use mysql_xdevapi\Exception;

class GetLabel extends Component
{
    public $data;

    protected $listeners = [
        'get_label' => 'getLabel'
    ];

    public function prev() {
        $this->emit('preview_step');
    }

    public function getLabel($data) {
        try {
            if (!isset($data['user_id']))
            {
                $newUser = User::create([
                    'email' => $data['email'],
                    'agent_id' => auth()->user()->id,
                    'password' => Hash::make('secret-password'),
                ]);
                // Send welcome email with new account information to customer
                Event(new NewUserEvent($newUser));
                $user_id = $newUser->id;
            }
            else
                $user_id = $data['user_id'];
           
            $scanning = OrderScanning::create([
                'tracking_code' => (Str::random(10)),
                'email' => $data['email'],
                'paper_count' => $data['paper_count'],
                'agent_accept_status' => 'Accept',
                'reject_reason_message' => '',
                'agent_id' => auth()->user()->id,
                'user_id' => $user_id,
            ]);
            Session::put('image', $scanning->id);;
            Session::put('label-type', 'scanning');
            Transactions::create([
                'price' => number_format((float)(-1 * abs(ltrim($data['price'], '$'))), 3, '.', ''),
                'currency' => 'CAD',
                'percentage' => $data['service_percentage'],
                'status' => 'successful',
                'payed_by' => 'agent - '.$data['payedBy'],
                'scanning_id' => $scanning->id,
                'user_id' => $user_id,
                'agent_id' => auth()->user()->id,
            ]);
            $this->data = $data;
            $this->data['tracking_code'] = $scanning->tracking_code;
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function render()
    {
        return view('livewire.admin.agent.scanning.details.get-label');
    }
}
