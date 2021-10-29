<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class Driver extends Model
{
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable;

     /**
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'countrey',
        'postalcode',
        'email_verified_at',
        'password',
        'profile_photo_path',
    ];

    public function Packages()
    {
        return $this->hasMany(OrderPackage::class);
    }

    public function Earning()
    {
        return $this->hasMany(DriverEarning::class);
    }
}
