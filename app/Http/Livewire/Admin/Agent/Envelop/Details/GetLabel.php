<?php

namespace App\Http\Livewire\Admin\Agent\Envelop\Details;

use App\Http\Livewire\Admin\Agent\GenerateTrackingNumber;
use App\Events\NewUserEvent;
use App\Models\Transactions;
use Session;
use App\Models\AddressBook;
use App\Models\OrderEnvelop;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use mysql_xdevapi\Exception;

class GetLabel extends Component
{
    public $label;

    protected $listeners = [
        'get_label' => 'getLabel'
    ];

    public function prev() {
        $this->emit('preview_step');
    }

    public function getLabel($data, $service, $label) {
        $this->label = "<img src='{$label}' width='100%'/>";

        $image = str_replace('data:image/jpeg;base64,', '', $label);
        $image = str_replace(' ', '+', $image);
        $imageName = $data['TrackingNumber'] . '.png';
        $trak_num = new GenerateTrackingNumber();

        Storage::disk('public_files')->put('images/labels/' . $imageName, base64_decode($image));
//        $trak_num = new GenerateTrackingNumber();
        try {
            if (!isset($data['from']['user_id']))
            {
                $newUser = User::create([
                    'name' => $data['from']['from-attention'],
                    'agent_id' => auth()->user()->id,
                    'email' => $data['from']['from-email'],
                    'username' => $data['from']['from-email'],
                    'password' => Hash::make('secret-password'),
                    'mobile' => $data['from']['from-phone'],
                    'address' => $data['from']['from-address1'],
                    'city' => $data['from']['from-city'],
                    'province' => $data['from']['from-province'],
                    'country' => $data['from']['from-country'],
                    'postal' => $data['from']['from-postal']
                ]);
                $user_id = $newUser->id;
                // Send welcome email with new account information to customer
                Event(new NewUserEvent($newUser));
            }
            else
                $user_id = $data['from']['user_id'];
            
            $order = OrderEnvelop::create([
                'tracking_code' => $data['TrackingNumber'],
                'tracking_code_1' => $trak_num->generateBarcodeNumber('parcel'),
                'label' => $imageName,
                'user_id' => $user_id,
                'agent_id' => auth()->user()->id,
                'weight' => $data['package']['weight'],
                'weight_type' => $data['package']['weight-type'],
                'service_code' => $service['service_code'],
                'service_name' => $service['service_name'],
                'country_to' => $data['to']['to-country'],
                'province_to' => $data['to']['to-province'],
                'city_to' => $data['to']['to-city'],
                'name_to' => $data['to']['to-company'],
                'line_1_to' => $data['to']['to-address1'],
                'line_2_to' => $data['to']['to-address2'] ?? '',
                'attention_to' => $data['to']['to-attention'],
                'postal_code_to' => $data['to']['to-postal'],
                'trans_type_to' => $data['to']['trans_type'],
                'phone_to' => $data['to']['to-phone'],
                'email_to' => $data['to']['to-email'],
                'instruction_to' => $data['to']['to-instruction'],
                'country_from' => $data['from']['from-country'],
                'province_from' => $data['from']['from-province'],
                'city_from' => $data['from']['from-city'],
                'name_from' => $data['from']['from-company'],
                'line_1_from' => $data['from']['from-address1'],
                'line_2_from' => $data['from']['from-address2'] ?? '',
                'attention_from' => $data['from']['from-attention'],
                'postal_code_from' => $data['from']['from-postal'],
                'trans_type_from' => $data['from']['trans_type'],
                'phone_from' => $data['from']['from-phone'],
                'email_from' => $data['from']['from-email'],
                'instruction_from' => $data['from']['from-instruction']
            ]);

            Session::put('image', $order->id);;
            Session::put('label-type', 'envelop');
            Session::put('invoice', $order->id);
            Session::put('invoice-type', 'envelop');

            Transactions::create([
                'price' => number_format((float)((-1 * abs(ltrim($service['tot_charge'], '$'))) * $service['tax']), 3, '.', ''),
                'currency' => $service['currency'],
                'percentage' => $service['percentage'],
                'status' => 'successful',
                'payed_by' => 'agent - '.$data['payedBy'],
                'envelop_id' => $order->id,
                'user_id' => $user_id,
                'agent_id' => auth()->user()->id,
            ]);
            if ($data['to']['addressBook']) {   
                AddressBook::create([
                    'name' => $data['to']['to-company'],
                    'user_id' => $user_id,
                    'type' => 'to',
                    'country' => $data['to']['to-country'],
                    'province' => $data['to']['to-province'],
                    'city' => $data['to']['to-city'],
                    'line_1' => $data['to']['to-address1'],
                    'line_2' => ($data['to']['to-address2'] ?? ''),
                    'attention' => $data['to']['to-attention'],
                    'postal_code' => $data['to']['to-postal'],
                    'trans_type' => $data['to']['trans_type'],
                    'phone' => $data['to']['to-phone'],
                    'email' => $data['to']['to-email'],
                    'instruction' => $data['to']['to-instruction'],
                    'service_type' => 'envelop'
                ]);
            }
            if ($data['from']['addressBook']) {
                AddressBook::create([
                    'name' => $data['from']['from-company'],
                    'user_id' => $user_id,
                    'type' => 'from',
                    'country' => $data['from']['from-country'],
                    'province' => $data['from']['from-province'],
                    'city' => $data['from']['from-city'],
                    'line_1' => $data['from']['from-address1'],
                    'line_2' => ($data['from']['from-address2'] ?? ''),
                    'attention' => $data['from']['from-attention'],
                    'postal_code' => $data['from']['from-postal'],
                    'trans_type' => $data['from']['trans_type'],
                    'phone' => $data['from']['from-phone'],
                    'email' => $data['from']['from-email'],
                    'instruction' => $data['from']['from-instruction'],
                    'service_type' => 'envelop'
                ]);
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function render()
    {
        return view('livewire.admin.agent.envelop.details.get-label');
    }
}
