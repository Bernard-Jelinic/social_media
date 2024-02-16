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
        return Person::whereHas('sentRequestTo', function ($query) use ($userId) {
            $query->where('status', 20)
                 ->where('receiver_id', $userId); // Ensure it's your sent requests
        })
        ->orWhereHas('receivedRequestFrom', function ($query) use ($userId) {
            $query->where('status', 20)
                 ->where('sender_id', $userId); // Ensure it's your received requests
        })
        ->get();
    }
}
