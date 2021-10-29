<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgentService extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'access_key',
        'username',
        'password',
        'account_number',
        'name'
    ];

    /**
     * @return BelongsTo
     */
    public function agent(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
