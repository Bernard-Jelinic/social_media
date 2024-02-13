<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\ProfileView;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        return $this->hasMany(Post::class);
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

    /**
     * Gets all friends of the user that is variable $userId with a status of 20.
     *
     * This method retrieves all users that are friends with the currently $userId
     * where the friendship status is 20. It uses the
     * `sentRequestTo` and `receivedRequestFrom` relationships to check both
     * sent and received friend requests. Additionally, it excludes any
     * users marked as "pages" (assuming a specific user type).
     *
     * @return Illuminate\Support\Collection A collection of User objects representing the $userId user's friends.
     */
    public static function friends(int $userId): \Illuminate\Database\Eloquent\Collection
    {
        return User::whereHas('sentRequestTo', function ($query) use ($userId) {
            $query->where('status', 20)
                 ->where('receiver_id', $userId); // Ensure it's your sent requests
        })
        ->orWhereHas('receivedRequestFrom', function ($query) use ($userId) {
            $query->where('status', 20)
                 ->where('sender_id', $userId); // Ensure it's your received requests
        })
        ->where('is_page', false)
        ->get();
    }
}
