<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Device extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'device_id',
        'type',
        'device_token',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the user that owns the Devices
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the access associated with the Devices
     */
    public function access(): HasOne
    {
        return $this->hasOne(Access::class);
    }
}
