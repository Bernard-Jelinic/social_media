<div class="post-bar">
    <div class="comment-section">
        <div class="post-comment">
            <div class="cm_img">
                <img style="width: 40px;" src="{{ asset(auth()->user()->profile_image) }}" alt="Profile image">
            </div>
            <div class="comment_box">
                <form wire:submit="savePost">
                    <input type="text" wire:model="content" placeholder="Post something you're thinking about">
                    <button type="submit">Post</button>
                </form>
            </div>
        </div>
    </div>
</div>