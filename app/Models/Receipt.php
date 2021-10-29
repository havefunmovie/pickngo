<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'country',
        'province',
        'tracking_number',
        'phone',
        'email',
        'note',
        'agent_id ',
        'dropoff_agent_id',
        'prof_receipt',
        'send_at',
    ];

    public function agent() {
        return $this->belongsTo(User::class);
    }
    public function dropoff_agent() {
        return $this->belongsTo(User::class);
    }
}
