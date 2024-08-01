<?php

namespace App\Traits;

use App\Models\Post;

trait PostTrait
{
    public $content = '';

    public function addPost(): void
    {
        Post::create([
            'user_id' => auth()->user()->id,
            'content' => $this->content
        ]);
        $this->content = '';
    }
}
