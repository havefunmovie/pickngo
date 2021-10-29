<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    use HasFactory;
    protected $table = 'branches';
    protected $fillable = [
        'name',
        'address1',
        'address2',
        'city',
        'province',
        'country',
        'postal_code',
        'phone',
        'branch_code',
        'owner',
        'company_name',
    ];
}
