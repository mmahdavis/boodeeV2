<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Participant extends Model
{
    use HasFactory;
    use HasApiTokens;
    protected $fillable = [
        'conversition_id',
        'user_id',
        'type',
        'created_at',
        'updated_at'
    ];

    /**
     * Get all of the report for the Participants
     */
    public function report(): HasMany
    {
        return $this->hasMany(Reports::class);
    }
    /**
     * Get the conversation that owns the Participants
     */
    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class);
    }
    /**
     * Get the user that owns the Participants
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get all of the blockList for the Participants
     */
    public function blockList(): HasMany
    {
        return $this->hasMany(BlockList::class);
    }
}
