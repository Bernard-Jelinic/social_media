<div>
    @if ($is_profile_of_logged_in_user)
        <livewire:post-add />
    @endif

    <div class="product-feed-tab current" id="feed-dd">
        <div class="posts-section">
            @foreach ($user->posts->reverse() as $key=>$post)
                {{-- top profiles section --}}
                @if ($key == 1 && $show_top_profiles && count($user->posts) > 2)
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
                <div class="post-bar">
                    <div class="post_topbar">
                        <div class="usy-dt">
                            <img style="width: 50px" src="{{ asset($user->profile_image) }}" alt="">
                            <div class="usy-name">
                                <h3>{{ $user->full_name }}</h3>
                                <span><img src="{{ asset('assets/images/clock.png') }}" alt="">{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <div class="ed-opts">
                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                            <ul class="ed-options">
                                <li><a href="#" title="">Edit Post</a></li>
                                <li><a href="#" title="">Unsaved</a></li>
                                <li><a href="#" title="">Unbid</a></li>
                                <li><a href="#" title="">Close</a></li>
                                <li><a href="#" title="">Hide</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="epi-sec">
                        <ul class="descp">
                            <li><img src="{{ asset('assets/images/icon8.png') }}" alt=""><span>{{ $user->headline }}</span></li>
                            <li><img src="{{ asset('assets/images/icon9.png') }}" alt=""><span>{{ $user->country->name }}</span></li>
                        </ul>
                        <ul class="bk-links">
                            <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                            <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                        </ul>
                    </div>
                    <div class="job_descp">
                        <h3>Senior Wordpress Developer</h3>
                        <ul class="job-dt">
                            <li><a href="#" title="">Full Time</a></li>
                            <li><span>$30 / hr</span></li>
                        </ul>
                        <p>{{ $post->content }}<!--<a href="#" title="">view more</a>--></p>
                        <ul class="skill-tags">
                            <li><a href="#" title="">HTML</a></li>
                            <li><a href="#" title="">PHP</a></li>
                            <li><a href="#" title="">CSS</a></li>
                            <li><a href="#" title="">Javascript</a></li>
                            <li><a href="#" title="">Wordpress</a></li> 	
                        </ul>
                    </div>
                    <div class="job-status-bar">
                        <ul class="like-com">
                            <li>
                                <a href="#"><i class="la la-heart"></i> Like</a>
                                <img src="{{ asset('assets/images/liked-img.png') }}" alt="">
                                <span>25</span>
                            </li> 
                            <li><a href="#" title="" class="com"><img src="{{ asset('assets/images/com.png') }}" alt=""> Comment 15</a></li>
                        </ul>
                        <a><i class="la la-eye"></i>Views 50</a>
                    </div>
                </div><!--post-bar end-->
                {{-- end --}}
            @endforeach
            <!--<div class="post-bar">
                <div class="post_topbar">
                    <div class="usy-dt">
                        <img src="http://via.placeholder.com/50x50" alt="">
                        <div class="usy-name">
                            <h3>John Doe</h3>
                            <span><img src="{{ asset('assets/images/clock.png') }}" alt="">3 min ago</span>
                        </div>
                    </div>
                    <div class="ed-opts">
                        <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                        <ul class="ed-options">
                            <li><a href="#" title="">Edit Post</a></li>
                            <li><a href="#" title="">Unsaved</a></li>
                            <li><a href="#" title="">Unbid</a></li>
                            <li><a href="#" title="">Close</a></li>
                            <li><a href="#" title="">Hide</a></li>
                        </ul>
                    </div>
                </div>
                <div class="epi-sec">
                    <ul class="descp">
                        <li><img src="{{ asset('assets/images/icon8.png') }}" alt=""><span>Front End Developer</span></li>
                        <li><img src="{{ asset('assets/images/icon9.png') }}" alt=""><span>India</span></li>
                    </ul>
                    <ul class="bk-links">
                        <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                        <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                        <li><a href="#" title="" class="bid_now">Bid Now</a></li>
                    </ul>
                </div>
                <div class="job_descp">
                    <h3>Simple Classified Site</h3>
                    <ul class="job-dt">
                        <li><span>$300 - $350</span></li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                    <ul class="skill-tags">
                        <li><a href="#" title="">HTML</a></li>
                        <li><a href="#" title="">PHP</a></li>
                        <li><a href="#" title="">CSS</a></li>
                        <li><a href="#" title="">Javascript</a></li>
                        <li><a href="#" title="">Wordpress</a></li> 	
                    </ul>
                </div>
                <div class="job-status-bar">
                    <ul class="like-com">
                        <li>
                            <a href="#"><i class="la la-heart"></i> Like</a>
                            <img src="{{ asset('assets/images/liked-img.png') }}" alt="">
                            <span>25</span>
                        </li> 
                        <li><a href="#" title="" class="com"><img src="{{ asset('assets/images/com.png') }}" alt=""> Comment 15</a></li>
                    </ul>
                    <a><i class="la la-eye"></i>Views 50</a>
                </div>
            </div>--><!--post-bar end-->
            <!--<div class="post-bar">
                <div class="post_topbar">
                    <div class="usy-dt">
                        <img src="http://via.placeholder.com/50x50" alt="">
                        <div class="usy-name">
                            <h3>John Doe</h3>
                            <span><img src="{{ asset('assets/images/clock.png') }}" alt="">3 min ago</span>
                        </div>
                    </div>
                    <div class="ed-opts">
                        <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                        <ul class="ed-options">
                            <li><a href="#" title="">Edit Post</a></li>
                            <li><a href="#" title="">Unsaved</a></li>
                            <li><a href="#" title="">Unbid</a></li>
                            <li><a href="#" title="">Close</a></li>
                            <li><a href="#" title="">Hide</a></li>
                        </ul>
                    </div>
                </div>
                <div class="epi-sec">
                    <ul class="descp">
                        <li><img src="{{ asset('assets/images/icon8.png')}}" alt=""><span>Epic Coder</span></li>
                        <li><img src="{{ asset('assets/images/icon9.png') }}" alt=""><span>India</span></li>
                    </ul>
                    <ul class="bk-links">
                        <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                        <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                    </ul>
                </div>
                <div class="job_descp">
                    <h3>Senior UI / UX designer</h3>
                    <ul class="job-dt">
                        <li><a href="#" title="">Par Time</a></li>
                        <li><span>$10 / hr</span></li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                    <ul class="skill-tags">
                        <li><a href="#" title="">HTML</a></li>
                        <li><a href="#" title="">PHP</a></li>
                        <li><a href="#" title="">CSS</a></li>
                        <li><a href="#" title="">Javascript</a></li>
                        <li><a href="#" title="">Wordpress</a></li> 	
                    </ul>
                </div>
                <div class="job-status-bar">
                    <ul class="like-com">
                        <li>
                            <a href="#"><i class="la la-heart"></i> Like</a>
                            <img src="{{ asset('assets/images/liked-img.png') }}" alt="">
                            <span>25</span>
                        </li> 
                        <li><a href="#" title="" class="com"><img src="{{ asset('assets/images/com.png') }}" alt=""> Comment 15</a></li>
                    </ul>
                    <a><i class="la la-eye"></i>Views 50</a>
                </div>
            </div>--><!--post-bar end-->
            <!--<div class="post-bar">
                <div class="post_topbar">
                    <div class="usy-dt">
                        <img src="http://via.placeholder.com/50x50" alt="">
                        <div class="usy-name">
                            <h3>John Doe</h3>
                            <span><img src="{{ asset('assets/images/clock.png') }}" alt="">3 min ago</span>
                        </div>
                    </div>
                    <div class="ed-opts">
                        <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                        <ul class="ed-options">
                            <li><a href="#" title="">Edit Post</a></li>
                            <li><a href="#" title="">Unsaved</a></li>
                            <li><a href="#" title="">Unbid</a></li>
                            <li><a href="#" title="">Close</a></li>
                            <li><a href="#" title="">Hide</a></li>
                        </ul>
                    </div>
                </div>
                <div class="epi-sec">
                    <ul class="descp">
                        <li><img src="{{ asset('assets/images/icon8.png') }}" alt=""><span>Epic Coder</span></li>
                        <li><img src="{{ asset('assets/images/icon9.png') }}" alt=""><span>India</span></li>
                    </ul>
                    <ul class="bk-links">
                        <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                        <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                        <li><a href="#" title="" class="bid_now">Bid Now</a></li>
                    </ul>
                </div>
                <div class="job_descp">
                    <h3>Ios Shopping mobile app</h3>
                    <ul class="job-dt">
                        <li><span>$300 - $350</span></li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                    <ul class="skill-tags">
                        <li><a href="#" title="">HTML</a></li>
                        <li><a href="#" title="">PHP</a></li>
                        <li><a href="#" title="">CSS</a></li>
                        <li><a href="#" title="">Javascript</a></li>
                        <li><a href="#" title="">Wordpress</a></li> 	
                    </ul>
                </div>
                <div class="job-status-bar">
                    <ul class="like-com">
                        <li>
                            <a href="#"><i class="la la-heart"></i> Like</a>
                            <img src="{{ asset('assets/images/liked-img.png') }}" alt="">
                            <span>25</span>
                        </li> 
                        <li><a href="#" title="" class="com"><img src="{{ asset('assets/images/com.png') }}" alt=""> Comment 15</a></li>
                    </ul>
                    <a><i class="la la-eye"></i>Views 50</a>
                </div>
            </div>--><!--post-bar end-->
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
