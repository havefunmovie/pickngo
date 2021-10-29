<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MailboxTypes extends Model
{
    use HasFactory;

    protected $fillable = [
        'box_type',
        'price',
        'expired_time',
        'expired_type',
        'agent_id'
    ];

    public function userMailboxes(): HasOne
    {
        return $this->hasOne(UserMailboxes::class, 'mailbox_type_id');
    }

    public function agent()
    {
        return $this->belongsTo(User::class);
    }
}