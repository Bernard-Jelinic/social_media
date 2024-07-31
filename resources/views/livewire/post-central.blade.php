<div>
    @if ($is_profile_of_logged_in_user)
        <livewire:post-add />
    @endif

    <div>
        <div class="posts-section">
            @foreach ($posts as $key=>$post)
                {{-- top profiles section --}}
                @if ($key == 1 && $show_top_profiles && count($posts) > 2)
                    <div class="top-profiles">
                        <div class="pf-hd">
                            <h3>Top Profiles</h3>
                            <i class="la la-ellipsis-v"></i>
                        </div>
                        <div class="profiles-slider">
            
                        @foreach ($random_users as $random_user)
                            <div class="user-profy">
                                <img style="width: 57px;" src="{{ asset($random_user->profile_image) }}" alt="">
                                <h3>{{ $random_user->full_name }}</h3>
                                <span>{{ $random_user->headline !== null ? $random_user->headline : '' }}</span>
                                <ul>
                                    <li>
                                        <a href="#" title="" class="followw">Follow</a>
                                    </li>
                                    <li>
                                        <a href="#" title="" class="envlp">
                                            <img src="{{asset('assets/images/envelop.png') }}" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="" class="hire">hire</a>
                                    </li>
                                </ul>
                                <a href="{{ route('profile.show', $random_user->id) }}" title="">View Profile</a>
                            </div><!--user-profy end-->
                        @endforeach
            
                        </div><!--profiles-slider end-->
                    </div><!--top-profiles end-->
                @endif
                {{-- <livewire:post :post="$post" :user="$post->user"/> --}}
                {{-- start --}}
                <div class="posty">
                    <div class="post-bar">
                        <div class="post_topbar">
                            <div class="usy-dt">
                                <a href="{{ route('profile.show', $post->user->id) }}">
                                    <img style="width: 50px" src="{{ asset($post->user->profile_image) }}" alt="Profile image">
                                </a>
                                <div class="usy-name">
                                    <a href="{{ route('profile.show', $post->user->id) }}">
                                        <h3>{{ $post->user->full_name }}</h3>
                                    </a>
                                    <span><img src="{{ asset('assets/images/clock.png') }}" alt="">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            <div class="ed-opts">
                                <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                <ul class="ed-options">
                                    <li><a href="#" title="">Edit Post</a></li>
                                    {{-- <li><a href="#" title="">Unsaved</a></li>
                                    <li><a href="#" title="">Unbid</a></li>
                                    <li><a href="#" title="">Close</a></li>
                                    <li><a href="#" title="">Hide</a></li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="epi-sec">
                            <ul class="descp">
                                <li><img style="height: 19px" src="{{ asset('assets/images/icon8.png') }}" alt="Headline icon"><span>{{ $post->user->headline }}</span></li>
                                <li><img style="height: 19px" src="{{ asset('assets/images/icon10.png') }}" alt="Location icon"><span>{{ $post->user->country->name }}</span></li>
                            </ul>
                            <ul class="bk-links">
                                {{-- <li><a href="#" title=""><i class="la la-bookmark"></i></a></li> --}}
                                <li><a href="{{ route('conversations.createOpenConversation', ['participant_one' => auth()->id(), 'participant_two' => $post->user->id] ) }}" title=""><i class="la la-envelope"></i></a></li>
                            </ul>
                        </div>
                        <div class="job_descp">
                            {{-- <h3>Senior Wordpress Developer</h3>
                            <ul class="job-dt">
                                <li><a href="#" title="">Full Time</a></li>
                                <li><span>$30 / hr</span></li>
                            </ul> --}}
                            <p>{{ $post->content }}<!--<a href="#" title="">view more</a>--></p>
                            {{-- <ul class="skill-tags">
                                <li><a href="#" title="">HTML</a></li>
                                <li><a href="#" title="">PHP</a></li>
                                <li><a href="#" title="">CSS</a></li>
                                <li><a href="#" title="">Javascript</a></li>
                                <li><a href="#" title="">Wordpress</a></li> 	
                            </ul> --}}
                        </div>
                        <div class="job-status-bar">
                            <div class="comment_box">
                                <form wire:submit="">
                                    <button wire:click="changeCommentDisplay({{ $post->id }})">Comment</button>
                                    <button disabled>{{ count($post->comments) }} {{ count($post->comments) == 1 ? 'Comment' : 'Comments' }}</button>
                                    <button wire:click="likeDislikePost({{ $post->id }})">{{ $post->likes->contains('user_id', auth()->user()->id) ? 'Unlike this post' : 'Like this post' }}</button>
                                    <button disabled><i class="la la-heart"></i>{{ count($post->likes) }} {{ count($post->likes) == 1 ? 'Like' : 'Likes' }}</button>
                                </form>
                            </div>
                        </div>
                        @if ($is_comments_display && $post->id == $post_id_to_display_comment)
                            <div class="comment-section">
                                <div class="plus-ic">
                                    <i class="la la-plus"></i>
                                </div>
                                @foreach ($post->comments as $comment)
                                    <div class="comment-sec">
                                        <ul>
                                            <li>
                                                <div class="comment-list">
                                                    <div class="bg-img">
                                                        <img class="profile-image-40" src="{{ asset($comment->user->profile_image) }}" alt="Users profile image">
                                                    </div>
                                                    <div class="comment">
                                                        <h3>{{ $comment->user->full_name }}</h3>
                                                        <span><img src="images/clock.png" alt="">{{ $comment->created_at->diffForHumans() }}</span>
                                                        <p>{{ $comment->content }}</p>
                                                    </div>
                                                </div><!--comment-list end-->
                                            </li>
                                        </ul>
                                    </div><!--comment-sec end-->
                                @endforeach
                                <ul>
                                    <li>
                                        <div class="comment_box">
                                            <form wire:submit="addComment({{ $post->id }})">
                                                <input type="text" wire:model="new_comment" placeholder="Write comment...">
                                                <button>Comment</button>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div><!--comment-section end-->
                        @endif
                    </div><!--post-bar end-->
                </div>
                {{-- end --}}
            @endforeach
            <div class="process-comm">
                <div class="spinner">
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                </div>
            </div><!--process-comm end-->
        </div><!--posts-section end-->
    </div><!--product-feed-tab end-->
</div>
