<?php

namespace App\Livewire;

use App\Models\Like;
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

    public $new_comment;
    public $is_comments_display = false;
    public $post_id_to_display_comment = null;

    public function mount(bool $is_profile_of_logged_in_user, object $user, bool $show_top_profiles = false): void
    {
        $this->is_profile_of_logged_in_user = $is_profile_of_logged_in_user;
        $this->user = $user;
        $this->show_top_profiles = $show_top_profiles;
        $this->random_users = User::inRandomOrder()->whereNotIn('id', [auth()->user()->id])->limit(10)->get();
    }

    #[On('get-posts')]
    public function getPosts(): void
    {
        $this->user = User::find(auth()->user()->id);
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

    public function render(): View
    {
        return view('livewire.post-central');
    }
}
