<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverEarning extends Model
{
    use HasFactory;
    /**
     *
     * @var array
     */
    protected $fillable = [
        'driver_id',
        'order_id',
        'amount',
        'status',
    ];

    public function Driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
