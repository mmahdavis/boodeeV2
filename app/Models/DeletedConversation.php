<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeletedConversation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'conversation_id',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the conversation that owns the Deleted_Conversation
     */
    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class);
    }
    /**
     * Get the user that owns the Deleted_Conversation
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
