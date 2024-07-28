<?php

namespace App\Models;

use App\Models\Scopes\PersonScope;
use App\Models\User;
use App\Enums\FriendStatus;

class Person extends User
{
    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new PersonScope);
    }
}
