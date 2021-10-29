<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderScanning extends Model
{
    use HasFactory;

    protected $table = 'order_scanning';

    protected $fillable = [
        'tracking_code',
        'email',
        'paper_count',
        'agent_accept_status',
        'reject_reason_message',
        'agent_id',
        'user_id',
    ];

    public function transactions() {
        return $this->hasOne(Transactions::class, 'scanning_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function agent() {
        return $this->belongsTo(User::class);
    }
}