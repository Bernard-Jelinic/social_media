<?php

namespace App\Livewire;

use App\Models\Like;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\On;

class PostCentral extends Component
{
    public $is_profile_of_logged_in_user;
    public $user;
    public $show_top_profiles;
    public $random_users;
    public $posts;
    public $new_comment;
    public $is_comments_display = false;
    public $post_id_to_display_comment = null;
    public $is_dashboard;
    public $number_of_posts_to_show = 10;
    public $number_of_all_posts;

    public function mount(bool $is_profile_of_logged_in_user, object $user, bool $show_top_profiles = false, bool $is_dashboard = true): void
    {
        $this->is_profile_of_logged_in_user = $is_profile_of_logged_in_user;
        $this->user = $user;
        $this->show_top_profiles = $show_top_profiles;
        $this->is_dashboard = $is_dashboard;
        $this->random_users = User::inRandomOrder()->whereNotIn('id', [auth()->user()->id])->limit(10)->get();

        $this->refreshComponent();
    }

    public function refreshComponent(): void
    {
        $array_of_user_ids_to_display = array($this->user->id);
        if ($this->is_dashboard) {
            // // ids of friends
            $push_to_array = $this->user->friends($this->user->id)->pluck('id')->toArray();
            // // in case if logged in user don't have friends
            if (count($push_to_array) > 0) {
                $array_of_user_ids_to_display = array_merge($array_of_user_ids_to_display, $push_to_array);
            }
        }
        $this->posts = Post::whereIn('user_id', $array_of_user_ids_to_display)->limit($this->number_of_posts_to_show)->orderBy('created_at', 'desc')->get();
        $this->number_of_all_posts = Post::whereIn('user_id', $array_of_user_ids_to_display)->orderBy('created_at', 'desc')->count();
    }

    public function addComment(int $post_id): void
    {
        Comment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post_id,
            'content' => $this->new_comment,
        ]);

        $this->new_comment = '';
    }

    public function deletePost(int $post_id)
    {
        $post = Post::find($post_id);
        $post->delete();
    }

    public function changeCommentDisplay(int $post_id): void
    {
        $this->is_comments_display = !$this->is_comments_display;
        $this->post_id_to_display_comment = $post_id;
    }

    public function likeDislikePost(int $post_id): void
    {
        $like = Like::where('post_id', $post_id)->where('user_id', auth()->user()->id)->first();
        if ($like == null) {
            Like::create([
                'post_id' => $post_id,
                'user_id' => auth()->user()->id
            ]);
        } else {
            $like->delete();
        }
    }

    public function showMorePosts()
    {
        $this->number_of_posts_to_show += 10;
    }

    public function render(): View
    {
        return view('livewire.post-central');
    }
}
