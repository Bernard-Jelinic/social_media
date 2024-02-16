<?php

namespace App\Models;

use App\Models\Scopes\PageScope;
use App\Models\User;

class Page extends User
{
    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new PageScope);
    }
}
