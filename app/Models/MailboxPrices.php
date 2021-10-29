<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailboxPrices extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_2',
        'customer_3',
        'personal_mode',
        'personal_plus_mode',
        'business_mode',
        'corporate_mode',
        'rental_fee',
        'refundable_deposit',
        'rental_month',
        'rental_year',
        'expired_msg',
        'agent_id',
    ];

    public function agent()
    {
        return $this->belongsTo(User::class);
    }
}