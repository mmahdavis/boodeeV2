<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlockList extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'participants_id',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the user that owns the BlockList
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the participant that owns the BlockList
     */
    public function participant(): BelongsTo
    {
        return $this->belongsTo(Participants::class);
    }
}
