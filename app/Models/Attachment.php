<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attachment extends Model
{
    use HasFactory;
    protected $fillable = [
        'message_id',
        'thumb_url',
        'filte_url',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the message that owns the Attachments
     */
    public function message(): BelongsTo
    {
        return $this->belongsTo(Message::class);
    }
}
