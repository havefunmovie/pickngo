<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderEnvelop extends Model
{
    use HasFactory;

    protected $table = 'order_envelop';

    protected $fillable = [
        'tracking_code',
        'tracking_code_1',
        'label',
        'weight',
        'weight_type',
        'length',
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
        'phone_from',
        'email_from',
        'desc_of_content',
        'unit',
        'value_of_content',
        'insurance',
        'width',
        'height',
        'dimen_type',
        'user_id',
        'agent_id',
        'breakable',
        'replaceable',
        'protection',
        'signature',
    ];

    public function transactions() {
        return $this->hasOne(Transactions::class, 'envelop_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}