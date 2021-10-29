<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'agent_id',
        'user_id',
        'from_address_id',
        'to_address_id',
        'driver_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function package()
    {
        return $this->hasOne(OrderPackage::class);
    }
    
}
