<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'created_at',
        'updated_at'
    ];

    /**
     * The UserContact that belong to the Contacts
     */
    public function UserContact(): BelongsToMany
    {
        return $this->belongsToMany(UserContact::class);
    }
}
