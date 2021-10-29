<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMailboxes extends Model
{
    use HasFactory;

    protected $table = 'user_mailboxes';

    protected $fillable = [
        'id',
        'tracking_code',
        'customer_1',
        'customer_2',
        'customer_3',
        'renewal_date',
        'mailbox_type',
        'photo1',
        'photo2',
        'confirm_status',
        'key_status',
        'mailbox_status',
        'renewal_alert_status',
        'prevent_display_alert_status',
        'mailbox_type_id',
        'user_id',
        'box_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function box() {
        return $this->belongsTo(Mailboxes::class);
    }

    public function boxtype() {
        return $this->belongsTo(MailboxTypes::class, 'mailbox_type_id');
    }

    public function transactions() {
        return $this->hasOne(Transactions::class, 'user_mailbox_id');
    }

}