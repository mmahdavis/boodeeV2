<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Conversation extends Model
{
    use HasFactory;
    use HasApiTokens;

    protected $fillable = [
        'title',
        'creator_id',
        'channel_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Get the user that owns the Conversation
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function participants(): HasMany
    {
        return $this->hasMany(Participants::class);
    }
    public function deletedConversation(): HasMany
    {
        return $this->hasMany(Deleted_Conversation::class);
    }
    /**
     * Get all of the message for the Conversation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function message(): HasMany
    {
        return $this->hasMany(Message::class, 'foreign_key', 'local_key');
    }
}
