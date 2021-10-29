<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    use HasFactory;

    protected $table = 'payment_info';

    protected $fillable = [
        'address1',
        'name_of_card',
        'address2',
        'credit_card',
        'country',
        'ex_month',
        'ex_year',
        'postal',
        'cvd_code',
        'city',
        'province',
        'default',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
