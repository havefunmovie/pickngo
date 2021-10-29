<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Invoices extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_transaction_id',
        'end_transaction_id',
        'invoice_number',
        'agent_id',
        'balance_value',
        'sent_msg_status',
        'seen_msg_status',
        'suspend_msg',
    ];

    public function withdraw(): HasMany
    {
        return $this->hasMany(Withdraws::class);
    }

    public function agent() {
        return $this->belongsTo(User::class);
    }
}
