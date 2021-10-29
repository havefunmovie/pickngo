<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraws extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'status',
        'admin_fail_msg',
        'admin_check_status',
        'transaction_id'
    ];

    public function transaction() {
        return $this->belongsTo(Transactions::class);
    }

    public function invoice() {
        return $this->belongsTo(Invoices::class);
    }
}
