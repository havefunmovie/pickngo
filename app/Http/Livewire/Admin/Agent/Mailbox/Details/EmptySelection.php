<?php

namespace App\Http\Livewire\Admin\Agent\Mailbox\Details;

use App\Http\Livewire\Admin\Agent\GenerateTrackingNumber;
use App\Models\Mailboxes;
use App\Models\MailboxTypes;
use App\Models\User;
use App\Models\UserMailboxes;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class EmptySelection extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $sortField = 'id';
    public $sortAsc = true;
    public $step;
    public $user_box;
    public $validated;
    public $box_ids = [];
    public $currentId;
    public $data = [];
//    public $box_types;
    public $users;
    public $userId;
    public $boxTypeId;
    public $key;

    protected $listeners = [
        'step' => 'selectStep',
        'selected' => 'selected'
    ];

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
        ];
    }

    public function mount() {
//        $this->box_types = MailboxTypes::where('agent_id', auth()->user()->id)->get();

        $this->users = User::where('level', null)->get();
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
        if (!$this->userId) {
            $this->user_box['password'] = '123456789';
            $this->user_box['confirm_password'] = '123456789';
        } else {
            $this->user_box['password'] = '';
            $this->user_box['confirm_password'] = '';
        }
    }

    public function selectStep($boxTypeId) {
//        $this->step = $step;
        $this->boxTypeId = $boxTypeId;
    }

    public function close() {
        $this->resetValidation();
        $this->validated = false;
        $this->user_box = false;
    }

    public function finish() {
        foreach ($this->data as $data) {
//            if (User::where('email', $data)->exists()) {
//                $user = User::where('email', $data)->first();
//            } else {
//                $user = User::create([
//                    'email' => $data['email'],
//                    'name' => $data['name'],
//                    'password' => $data['password'],
//                ]);
//            }

            if (!isset($data['user_id'])) {
                $user = User::create([
                    'email' => $data['email'],
                    'name' => $data['name'],
                    'password' => bcrypt($data['password']),
                    'mobile' => $this->user_box['phone']
                ]);
                $this->userId = $user['id'];
            } else {
                $this->userId = $data['user_id'];
            }

            $boxType = MailboxTypes::where('id', $this->boxTypeId)->first();
            if ($boxType['expired_type'] === 'month') {
                $ren_date = Carbon::now()->addMonthsNoOverflow($boxType['expired_time']);
            } else if ($boxType['expired_type'] === 'year') {
                $ren_date = Carbon::now()->addMonthsNoOverflow($boxType['expired_time'] * 12);
            }
            $trak_num = new GenerateTrackingNumber();
            $tracking_number = $trak_num->generateBarcodeNumber('mailbox');

            UserMailboxes::create([
                'customer_1' => $data['customer1'],
                'customer_2' => $data['customer2'] ?? '',
                'customer_3' => $data['customer3'] ?? '',
                'renewal_date' => $ren_date,
                'mailbox_type' => $data['mailbox_type'],
                'user_id' => $this->userId,
                'box_id' => $data['box_id'],
                'mailbox_type_id' => $this->boxTypeId,
                'confirm_status' => 1,
                'tracking_code' => $tracking_number,
                'key_status' => $this->key ? 1 : 0
            ]);
            Mailboxes::where('id', $data['box_id'])->update([
                'is_empty' => 0
            ]);
        }
        Mailboxes::where('is_temp', 1)->update([
            'is_temp' => 0
        ]);

        return redirect()->route('agent.mailbox.index');
    }

    public function selected($id) {
        $exist = false;

        foreach ($this->box_ids as $key => $value){
            if ($value == $id) {
                $exist = true;
                unset($this->box_ids[$key]);
            }
        }

        foreach ($this->data as $key => $value){
            if ($value['box_id'] == $id) {
                unset($this->data[$key]);
            }
        }

        if (!$exist) {
            array_push($this->box_ids, $id);

            $this->dispatchBrowserEvent('user-detail', $id);
        }

        $this->currentId = $id;
    }

    public function addUser() {
        $this->validate();
        $this->user_box['box_id'] = $this->currentId;
        if (!isset($this->user_box['email'])) {
            $this->user_box['user_id'] = $this->userId;
        }
        array_push(
            $this->data,
            $this->user_box
        );
        $this->close();
        $this->dispatchBrowserEvent('close-user-detail');
    }

    public function render()
    {
        return view('livewire.admin.agent.mailbox.details.empty-selection',[
            'boxes' => Mailboxes::where('is_temp', 1)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage),
        ]);
    }
}
