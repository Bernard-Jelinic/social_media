<?php

namespace App\Models;

use App\Models\Scopes\PageScope;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
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
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new PageScope);
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
}
