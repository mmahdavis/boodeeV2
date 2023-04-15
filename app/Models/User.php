<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'is_active',
        'is_reported',
        'is_bloked',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public function blockList(): HasMany
    {
        return $this->hasMany(BlockList::class);
    }
    /**
     * Get all of the access for the User
     */
    public function access(): HasMany
    {
        return $this->hasMany(Access::class);
    }
    /**
     * Get all of the device for the User
     */
    public function device(): HasMany
    {
        return $this->hasMany(Devices::class);
    }
    /**
     * Get all of the participant for the User
     */
    public function participant(): HasMany
    {
        return $this->hasMany(Participants::class);
    }
    /**
     * Get all of the report for the User
     */
    public function report(): HasMany
    {
        return $this->hasMany(Reports::class);
    }
    /**
     * Get all of the conversation for the User
     */
    public function conversation(): HasMany
    {
        return $this->hasMany(Conversation::class);
    }
    /**
     * Get all of the deletedConversition for the User
     */
    public function deletedConversition(): HasMany
    {
        return $this->hasMany(Deleted_Conversation::class);
    }
    /**
     * Get all of the deletedMessage for the User
     */
    public function deletedMessage(): HasMany
    {
        return $this->hasMany(Deleted_Messages::class);
    }
    /**
     * Get all of the message for the User
     */
    public function message(): HasMany
    {
        return $this->hasMany(Message::class);
    }
    /**
     * Get all of the userContact for the User
     */
    public function userContact(): HasMany
    {
        return $this->hasMany(UserContact::class);
    }
}
