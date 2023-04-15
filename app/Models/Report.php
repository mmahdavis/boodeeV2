<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'participants_id',
        'report_type',
        'notes',
        'status',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the participant that owns the Reports
     */
    public function participant(): BelongsTo
    {
        return $this->belongsTo(Participants::class);
    }
    /**
     * Get the user that owns the Reports
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
