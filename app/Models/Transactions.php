<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'trans_code',
        'price',
        'percentage',
        'currency',
        'status',
        'payed_by',
        'parcel_id',
        'envelop_id',
        'faxing_id',
        'printing_id',
        'scanning_id',
        'user_mailbox_id',
        'agent_id',
        'system_check',
        'user_id',
        'puckup_delivery_id',
    ];

    public function parcel() {
        return $this->belongsTo(OrderParcel::class);
    }

    public function envelop() {
        return $this->belongsTo(OrderEnvelop::class);
    }

    public function faxing() {
        return $this->belongsTo(OrderFaxing::class);
    }

    public function printing() {
        return $this->belongsTo(OrderPrinting::class);
    }

    public function scanning() {
        return $this->belongsTo(OrderScanning::class);
    }

    public function userMailboxes() {
        return $this->belongsToMany(UserMailboxes::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function agent() {
        return $this->belongsTo(User::class);
    }

    public function withdraws() {
        return $this->hasOne(Withdraws::class);
    }
    
    public function pickup() {
        return $this->belongsTo(OrderPackage::class);
    }
//    public function transaction() {
//        return $this->belongsTo(Transactions::class);
//    }
}
