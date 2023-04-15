<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeletedMessage extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'message_id',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the user that owns the Deleted_Messages
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the message that owns the Deleted_Messages
     */
    public function message(): BelongsTo
    {
        return $this->belongsTo(Message::class);
    }
}
