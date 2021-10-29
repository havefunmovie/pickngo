<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankInfo extends Model
{
    protected $table = 'bank_info';

    use HasFactory;

    protected $fillable = [
        'back_name',
        'transaction_number',
        'branch_code',
        'default',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}