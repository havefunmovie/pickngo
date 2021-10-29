<?php

namespace App\Models;

use App\Models\Traits\Metas;
use App\Models\Traits\User\Info;
use App\Models\Traits\User\Access;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Ups\Entity\Address;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    const META_KEY = 'user_id';
    use Metas;
    use Info;

//    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'agent_id',
        'name',
        'family',
        'email',
        'username',
        'mobile',
        'type',
        'email_verified_at',
        'password',
        'level',
        'profile_photo_path',
        'created_at',
        'updated_at',
        'status',
        'address',
        'postal',
        'company_name',
        'city',
        'operator_name',
        'province',
        'def_pass',
        'def_pass_status',
        'web_link',
        'fax'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * @return HasOne
     */
    public function metas(): HasOne
    {
        return $this->hasOne(UserMeta::class);
    }

    /**
     * @return HasMany
     */
    public function address(): HasMany
    {
        return $this->hasMany(AddressBook::class);
    }

    /**
     * @return HasOne
     */
    public function permissions(): HasOne
    {
        return $this->hasOne(UserPermission::class);
    }

    /**
     * @return BelongsTo
     */
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function parcels(): HasMany
    {
        return $this->hasMany(OrderParcel::class);
    }

    public function envelops(): HasMany
    {
        return $this->hasMany(OrderEnvelop::class);
    }

    public function scanning(): HasMany
    {
        return $this->hasMany(OrderScanning::class);
    }

    public function printing(): HasMany
    {
        return $this->hasMany(OrderPrinting::class);
    }

    public function faxing(): HasMany
    {
        return $this->hasMany(OrderFaxing::class);
    }

    public function paymentInfo(): HasMany
    {
        return $this->hasMany(PaymentInfo::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transactions::class);
    }

    public function serivces(): HasOne
    {
        return $this->hasOne(AgentService::class);
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoices::class);
    }

    public function bankInfo(): HasMany
    {
        return $this->hasMany(BankInfo::class);
    }

    public function temp(): HasMany
    {
        return $this->hasMany(Temp::class);
    }

    public function mailboxes(): HasMany
    {
        return $this->hasMany(Mailboxes::class);
    }

    public function mailboxPrice(): HasOne
    {
        return $this->hasOne(MailboxPrices::class);
    }

    public function userMailbox(): HasOne
    {
        return $this->hasOne(UserMailboxes::class);
    }

    public function mailboxTypes(): HasMany
    {
        return $this->hasMany(MailboxTypes::class);
    }

    public function packages(): HasMany
    {
        return $this->hasMany(OrderPackage::class);
    }
    
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
