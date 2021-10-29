<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temp extends Model
{
    use HasFactory;

    protected $table = 'temp';

    protected $fillable = [
        'user_id',
        'temp_file'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}