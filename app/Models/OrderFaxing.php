<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFaxing extends Model
{
    use HasFactory;

    protected $table = 'order_faxing';

    protected $fillable = [
        'tracking_code',
        'phone',
        'paper_count',
        'agent_accept_status',
        'reject_reason_message',
        'agent_id',
        'user_id'
    ];

    public function transactions() {
        return $this->hasOne(Transactions::class, 'faxing_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function agent() {
        return $this->belongsTo(User::class);
    }
}