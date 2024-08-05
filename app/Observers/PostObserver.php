<?php

namespace App\Observers;

use App\Events\PostEvent;
use App\Models\Post;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        event(new PostEvent($post->user_id));
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        event(new PostEvent($post->user_id));
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
