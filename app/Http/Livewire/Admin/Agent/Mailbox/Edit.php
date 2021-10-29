<?php

namespace App\Http\Livewire\Admin\Agent\Mailbox;

use App\Http\Livewire\Admin\Agent\GenerateTrackingNumber;
use App\Models\Mailboxes;
use App\Models\MailboxTypes;
use App\Models\User;
use App\Models\UserMailboxes;
use Carbon\Carbon;
use Livewire\Component;

class Edit extends Component
{
    public $validated, $selection, $box_types, $user_box, $boxId;
    public $users;
    public $userId;
    public $key;

//    protected array $rules = [
//        'user_box.email'            => ['email', ($this->userId ? '' : 'required')],
//        'user_box.name'             => '',
//        'user_box.password'         => 'min:8',
//        'user_box.confirm_password' => 'min:8|same:user_box.password',
//        'user_box.customer1'        => 'required',
//        'user_box.customer2'        => 'string',
//        'user_box.customer3'        => 'string',
////        'user_box.renewal_date'     => 'required',
//        'user_box.mailbox_type'     => 'required',
//        'user_box.mailbox_type_id'  => 'required',
//    ];

    public function rules()
    {
        return [
            'user_box.email'            => ['email', ($this->userId ? '' : 'required')],
            'user_box.name'             => ['string', ($this->userId ? '' : 'required')],
            'user_box.password'         => ['min:8', ($this->userId ? '' : 'required')],
            'user_box.confirm_password' => ['min:8', 'same:user_box.password', ($this->userId ? '' : 'required')],
            'user_box.phone'            => ['numeric',($this->userId ? '' : 'required')],
            'user_box.customer1'        => 'required',
            'user_box.customer2'        => 'string',
            'user_box.customer3'        => 'string',
            'user_box.mailbox_type'     => 'required',
            'user_box.mailbox_type_id'  => 'required',
        ];
    }

    public function mount($id) {
        $this->boxId = $id;
        $this->box_types = MailboxTypes::where('agent_id', auth()->user()->id)->get();

        $this->users = User::where('level', null)->get();
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function edit() {
        $this->validate();
        if (!is_numeric($this->userId)) {
            $user = User::create([
                'email' => $this->user_box['email'],
                'name' => $this->user_box['name'],
                'password' => bcrypt($this->user_box['password']),
                'mobile' => $this->user_box['phone']
            ]);
            $this->userId = $user['id'];
        }

        $boxType = MailboxTypes::where('id', $this->user_box['mailbox_type_id'])->first();
        if ($boxType['expired_type'] === 'month') {
            $ren_date = Carbon::now()->addMonthsNoOverflow($boxType['expired_time']);
        } else if ($boxType['expired_type'] === 'year') {
            $ren_date = Carbon::now()->addMonthsNoOverflow($boxType['expired_time'] * 12);
        }

        $trak_num = new GenerateTrackingNumber();
        $tracking_number = $trak_num->generateBarcodeNumber('mailbox');

        UserMailboxes::create([
            'customer_1' => $this->user_box['customer1'],
            'customer_2' => $this->user_box['customer2'] ?? '',
            'customer_3' => $this->user_box['customer3'] ?? '',
            'renewal_date' => $ren_date,
            'mailbox_type' => $this->user_box['mailbox_type'],
            'user_id' => $this->userId,
            'box_id' => $this->boxId,
            'mailbox_type_id' => $this->user_box['mailbox_type_id'],
            'confirm_status' => 1,
            'tracking_code' => $tracking_number,
            'key_status' => $this->key ? 1 : 0
        ]);
        Mailboxes::where('id', $this->boxId)->update([
            'is_empty' => 0
        ]);

        return redirect()->route('agent.mailbox.index');
    }

    public function render()
    {
        return view('livewire.admin.agent.mailbox.edit')->layout('livewire.admin.master');
    }
}
