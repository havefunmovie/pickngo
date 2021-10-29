<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPrinting extends Model
{
    use HasFactory;

    protected $table = 'order_printing';

    protected $fillable = [
        'tracking_code',
        'paper_type',
        'color_type',
        'paper_count',
        'uploaded_file',
        'agent_accept_status',
        'reject_reason_message',
        'agent_id',
        'user_id'
    ];

    public function transactions() {
        return $this->hasOne(Transactions::class, 'printing_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function agent() {
        return $this->belongsTo(User::class);
    }
}