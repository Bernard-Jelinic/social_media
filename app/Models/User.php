<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Musonza\Chat\Traits\Messageable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\ProfileView;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Messageable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'is_page',
        'first_name',
        'last_name',
        'headline',
        'country_id',
        'email',
        'password',
        'profile_image',
        'cover_image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * The attributes that should be appended.
     *
     * @var array<string, string>
     */
    public $appends = ['full_name'];

    /**
     * Additional attribute
     */
    function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    /**
     * Returns a collection of User instances representing the user's friends.
     */
    public function sentRequestTo(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friends','sender_id', 'receiver_id');
    }

    public function receivedRequestFrom(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friends','receiver_id', 'sender_id');
    }

    /**
     * Get the posts from this user.
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    /**
     * Get the user that owns the country.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function profileViews(): HasMany
    {
        return $this->hasMany(ProfileView::class, 'user_id');
    }
}
