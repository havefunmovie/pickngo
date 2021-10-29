<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dropoff extends Model
{
    use HasFactory;

    protected $table = 'drop_off';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'tracking_number',
        'company',
        'note',
        'agent_id',
        'prof_receipt',
        'dropoff_agent_id',
        'send_at',
    ];

    public function Agent()
    {
        return $this->belongsTo(User::class);
    }
}
