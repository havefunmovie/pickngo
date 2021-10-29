<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderParcel extends Model
{
    use HasFactory;

    protected $table = 'order_parcel';

    protected $fillable = [
        'tracking_code',
        'label',
        'weight',
        'weight_type',
        'length',
        'width',
        'height',
        'dimen_type',
        'service_code',
        'service_name',
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
        'value_of_content',
        'unit',
        'desc_of_content',
        'insurance',
        'tracking_code_1',
        'phone_from',
        'email_from',
        'user_id',
        'agent_id',
        'breakable',
        'replaceable',
        'protection',
        'signature',
    ];

    public function transactions() {
        return $this->hasOne(Transactions::class, 'parcel_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
