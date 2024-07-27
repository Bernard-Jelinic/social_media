<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            Comment::create([
                'user_id' => 2,
                'post_id' => $post->id,
                'content' => 'Comment for ' . $post->user->first_name
            ]);
        }
    }
}
