<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mailboxes extends Model
{
    use HasFactory;

    protected $table = 'mailboxes';

    protected $fillable = [
        'number',
        'type',
        'is_empty',
        'is_temp',
        'agent_id'
    ];

    public function agent()
    {
        return $this->belongsTo(User::class);
    }

    public function boxType()
    {
        return $this->belongsTo(MailboxTypes::class/*, 'mailbox_type_id'*/);
    }

    public function userMailbox() {
        return $this->hasOne(UserMailboxes::class, 'box_id');
    }
}