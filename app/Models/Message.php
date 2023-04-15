<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Message extends Model
{
    use HasFactory;
    use HasApiTokens;
    protected $fillable = [
        'conversation_id',
        'user_id',
        'parent_id',
        'message_type',
        'message',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the user that owns the Message
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the conversation that owns the Message
     */
    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class);
    }
    /**
     * Get all of the deleted_message for the Message
     */
    public function deleted_message(): HasMany
    {
        return $this->hasMany(Deleted_Messages::class);
    }
    /**
     * Get all of the attachment for the Message
     */
    public function attachment(): HasMany
    {
        return $this->hasMany(Attachments::class);
    }
    /**
     * Get the message that owns the Message
     */
    public function message(): BelongsTo
    {
        return $this->belongsTo(Message::class);
    }
}
