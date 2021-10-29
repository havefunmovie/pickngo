<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class OrderPackage extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'order_id',
        'user_id',
        'tracking_code',
        'label',
        'service_type',
        'service_cost',
        'status',
        'weight',
        'weight_type',
        'dimension_type',
        'height',
        'width',
        'length',
        'description',
        'delivered_image',

        'country_from',
        'province_from',
        'city_from',
        'name_from',
        'line_1_from',
        'line_2_from',
        'attention_from',
        'instruction_from',
        'postal_code_from',
        'trans_type_from',
        'phone_from',
        'email_from',

        'country_to',
        'province_to',
        'city_to',
        'name_to',
        'line_1_to',
        'line_2_to',
        'attention_to',
        'instruction_to',
        'postal_code_to',
        'trans_type_to',
        'phone_to',
        'email_to',
        
        'pickup_time',
        'deliver_time',
        'pickedup_at',
        'delivered_at',
        'accepted_at',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function transactions() {
        return $this->hasOne(Transactions::class, 'puckup_delivery_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
