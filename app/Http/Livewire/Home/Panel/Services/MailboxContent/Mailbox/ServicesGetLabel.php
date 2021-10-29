<?php

namespace App\Http\Livewire\Home\Panel\Services\MailboxContent\Mailbox;

use App\Models\Mailboxes;
use App\Models\MailboxTypes;
use App\Models\Services;
use App\Models\Transactions;
use App\Models\UserMailboxes;
use Carbon\Carbon;
use Livewire\Component;

class ServicesGetLabel extends Component
{
    public $data;

    public function mount($data) {
        if ($this->data) {
            Transactions::where('user_mailbox_id', $data['id'])->update([
                'status' => 'successful',
                'price' => number_format((float)($data['total_price'] * (1 - $data['service_percentage'])), 2, '.', ''),
            ]);

            Mailboxes::where('id', $data['box_id'])->update([
                'is_empty' => 0
            ]);

            if (UserMailboxes::where('id', $data['user_mailbox_id'])->where('mailbox_status', 'suspended')->exists()) {
                $user_mailbox = UserMailboxes::where('id', $data['user_mailbox_id'])->where('mailbox_status', 'suspended')->first();
                $datetime = new Carbon($user_mailbox['renewal_date']);
                $boxType = MailboxTypes::where('id', $user_mailbox['mailbox_type_id'])->first();
                if ($boxType['expired_type'] === 'month') {
                    $ren_date = $datetime->addMonthsNoOverflow($boxType['expired_time']);
                } else if ($boxType['expired_type'] === 'year') {
                    $ren_date = $datetime->addMonthsNoOverflow($boxType['expired_time'] * 12);
                }
                UserMailboxes::where('id', $data['user_mailbox_id'])->update([
                    'mailbox_status' => null,
                    'confirm_status' => 1,
                    'renewal_date' => $ren_date,
                    'renewal_alert_status' => 0,
                    'prevent_display_alert_status' => 0
                ]);
            }
        }
    }

    public function render()
    {
        return view('livewire.home.panel.services.mailbox-content.mailbox.get-label');
    }
}
