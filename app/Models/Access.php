<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Access extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'device_id','token','created_at','updated_at'
    ];
    /**
     * Get the user that owns the Access
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the device that owns the Access
     */
    public function device(): BelongsTo
    {
        return $this->belongsTo(Devices::class);
    }
}
