<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserContact extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'contact_id',
        'first_name',
        'last_name',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the contact associated with the UserContact
     */
    public function contact(): HasOne
    {
        return $this->hasOne(Contacts::class);
    }
    /**
     * Get the user that owns the UserContact
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
