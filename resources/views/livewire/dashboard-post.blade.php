<div class="main-ws-sec">
    <div class="post-topbar">
        <div class="user-picy">
            <img src="http://via.placeholder.com/100x100" alt="">
        </div>
        <div class="post-st">
            <ul>
                <li><a class="post_project" href="#" title="">Post a Project</a></li>
                <li><a class="post-jb active" href="#" title="">Post a Job</a></li>
            </ul>
        </div><!--post-st end-->
    </div><!--post-topbar end-->

    <div class="post-bar">
        <div class="comment-section">
            <div class="post-comment">
                <div class="cm_img">
                    <img style="width: 40px;" src="{{ auth()->user()->profile_image }}" alt="Profile image">
                </div>
                <div class="comment_box">
                    <form wire:submit="save">
                        <input type="text" wire:model="content" placeholder="Post something you're thinking about">
                        <button type="submit">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="posts-section">
        <div class="post-bar">
            <div class="post_topbar">
                <div class="usy-dt">
                    <img src="http://via.placeholder.com/50x50" alt="">
                    <div class="usy-name">
                        <h3>John Doe</h3>
                        <span><img src="{{asset('assets/images/clock.png') }}" alt="">3 min ago</span>
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
                    <li><img src="{{asset('assets/images/icon8.png') }}" alt=""><span>Epic Coder</span></li>
                    <li><img src="{{asset('assets/images/icon9.png') }}" alt=""><span>India</span></li>
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
                        <img src="{{asset('assets/images/liked-img.png') }}" alt="">
                        <span>25</span>
                    </li> 
                    <li><a href="#" title="" class="com"><img src="{{asset('assets/images/com.png') }}" alt=""> Comment 15</a></li>
                </ul>
                <a><i class="la la-eye"></i>Views 50</a>
            </div>
        </div><!--post-bar end-->
        <div class="top-profiles">
            <div class="pf-hd">
                <h3>Top Profiles</h3>
                <i class="la la-ellipsis-v"></i>
            </div>
            <div class="profiles-slider">
                <div class="user-profy">
                    <img src="http://via.placeholder.com/57x57" alt="">
                    <h3>John Doe_1</h3>
                    <span>Graphic Designer</span>
                    <ul>
                        <li><a href="#" title="" class="followw">Follow</a></li>
                        <li><a href="#" title="" class="envlp"><img src="{{asset('assets/images/envelop.png') }}" alt=""></a></li>
                        <li><a href="#" title="" class="hire">hire</a></li>
                    </ul>
                    <a href="#" title="">View Profile</a>
                </div><!--user-profy end-->
                <div class="user-profy">
                    <img src="http://via.placeholder.com/57x57" alt="">
                    <h3>John Doe_2</h3>
                    <span>Graphic Designer</span>
                    <ul>
                        <li><a href="#" title="" class="followw">Follow</a></li>
                        <li><a href="#" title="" class="envlp"><img src="{{asset('assets/images/envelop.png') }}" alt=""></a></li>
                        <li><a href="#" title="" class="hire">hire</a></li>
                    </ul>
                    <a href="#" title="">View Profile</a>
                </div><!--user-profy end-->
                <div class="user-profy">
                    <img src="http://via.placeholder.com/57x57" alt="">
                    <h3>John Doe_3</h3>
                    <span>Graphic Designer</span>
                    <ul>
                        <li><a href="#" title="" class="followw">Follow</a></li>
                        <li><a href="#" title="" class="envlp"><img src="{{asset('assets/images/envelop.png') }}" alt=""></a></li>
                        <li><a href="#" title="" class="hire">hire</a></li>
                    </ul>
                    <a href="#" title="">View Profile</a>
                </div><!--user-profy end-->
                <div class="user-profy">
                    <img src="http://via.placeholder.com/57x57" alt="">
                    <h3>John Doe_4</h3>
                    <span>Graphic Designer</span>
                    <ul>
                        <li><a href="#" title="" class="followw">Follow</a></li>
                        <li><a href="#" title="" class="envlp"><img src="{{asset('assets/images/envelop.png') }}" alt=""></a></li>
                        <li><a href="#" title="" class="hire">hire</a></li>
                    </ul>
                    <a href="#" title="">View Profile</a>
                </div><!--user-profy end-->
                <div class="user-profy">
                    <img src="http://via.placeholder.com/57x57" alt="">
                    <h3>John Doe_5</h3>
                    <span>Graphic Designer</span>
                    <ul>
                        <li><a href="#" title="" class="followw">Follow</a></li>
                        <li><a href="#" title="" class="envlp"><img src="{{asset('assets/images/envelop.png') }}" alt=""></a></li>
                        <li><a href="#" title="" class="hire">hire</a></li>
                    </ul>
                    <a href="#" title="">View Profile</a>
                </div><!--user-profy end-->
                <div class="user-profy">
                    <img src="http://via.placeholder.com/57x57" alt="">
                    <h3>John Doe_6</h3>
                    <span>Graphic Designer</span>
                    <ul>
                        <li><a href="#" title="" class="followw">Follow</a></li>
                        <li><a href="#" title="" class="envlp"><img src="{{asset('assets/images/envelop.png') }}" alt=""></a></li>
                        <li><a href="#" title="" class="hire">hire</a></li>
                    </ul>
                    <a href="#" title="">View Profile</a>
                </div><!--user-profy end-->
            </div><!--profiles-slider end-->
        </div><!--top-profiles end-->
        <div class="post-bar">
            <div class="post_topbar">
                <div class="usy-dt">
                    <img src="http://via.placeholder.com/50x50" alt="">
                    <div class="usy-name">
                        <h3>John Doe_7</h3>
                        <span><img src="{{asset('assets/images/clock.png') }}" alt="">3 min ago</span>
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
                    <li><img src="{{asset('assets/images/icon8.png') }}" alt=""><span>Epic Coder</span></li>
                    <li><img src="{{asset('assets/images/icon9.png') }}" alt=""><span>India</span></li>
                </ul>
                <ul class="bk-links">
                    <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                    <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                    <li><a href="#" title="" class="bid_now">Bid Now</a></li>
                </ul>
            </div>
            <div class="job_descp">
                <h3>Senior Wordpress Developer</h3>
                <ul class="job-dt">
                    <li><a href="#" title="">Full Time</a></li>
                    <li><span>$30 / hr</span></li>
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
                        <img src="{{asset('assets/images/liked-img.png') }}" alt="">
                        <span>25</span>
                    </li> 
                    <li><a href="#" title="" class="com"><img src="{{asset('assets/images/com.png') }}" alt=""> Comment 15</a></li>
                </ul>
                <a><i class="la la-eye"></i>Views 50</a>
            </div>
        </div><!--post-bar end-->
        <div class="posty">
            <div class="post-bar no-margin">
                <div class="post_topbar">
                    <div class="usy-dt">
                        <img src="http://via.placeholder.com/50x50" alt="">
                        <div class="usy-name">
                            <h3>John Doe</h3>
                            <span><img src="{{asset('assets/images/clock.png') }}" alt="">3 min ago</span>
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
                        <li><img src="{{asset('assets/images/icon8.png') }}" alt=""><span>Epic Coder</span></li>
                        <li><img src="{{asset('assets/images/icon9.png') }}" alt=""><span>India</span></li>
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
                            <img src="{{asset('assets/images/liked-img.png') }}" alt="">
                            <span>25</span>
                        </li> 
                        <li><a href="#" title="" class="com"><img src="{{asset('assets/images/com.png') }}" alt=""> Comment 15</a></li>
                    </ul>
                    <a><i class="la la-eye"></i>Views 50</a>
                </div>
            </div><!--post-bar end-->
            <div class="comment-section">
                <div class="plus-ic">
                    <i class="la la-plus"></i>
                </div>
                <div class="comment-sec">
                    <ul>
                        <li>
                            <div class="comment-list">
                                <div class="bg-img">
                                    <img src="http://via.placeholder.com/40x40" alt="">
                                </div>
                                <div class="comment">
                                    <h3>John Doe</h3>
                                    <span><img src="{{asset('assets/images/clock.png') }}" alt=""> 3 min ago</span>
                                    <p>Lorem ipsum dolor sit amet, </p>
                                    <a href="#" title="" class="active"><i class="fa fa-reply-all"></i>Reply</a>
                                </div>
                            </div><!--comment-list end-->
                            <ul>
                                <li>
                                    <div class="comment-list">
                                        <div class="bg-img">
                                            <img src="http://via.placeholder.com/40x40" alt="">
                                        </div>
                                        <div class="comment">
                                            <h3>John Doe</h3>
                                            <span><img src="{{asset('assets/images/clock.png') }}" alt=""> 3 min ago</span>
                                            <p>Hi John </p>
                                            <a href="#" title=""><i class="fa fa-reply-all"></i>Reply</a>
                                        </div>
                                    </div><!--comment-list end-->
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="comment-list">
                                <div class="bg-img">
                                    <img src="http://via.placeholder.com/40x40" alt="">
                                </div>
                                <div class="comment">
                                    <h3>John Doe</h3>
                                    <span><img src="{{asset('assets/images/clock.png') }}" alt=""> 3 min ago</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at.</p>
                                    <a href="#" title=""><i class="fa fa-reply-all"></i>Reply</a>
                                </div>
                            </div><!--comment-list end-->
                        </li>
                    </ul>
                </div><!--comment-sec end-->
                <div class="post-comment">
                    <div class="cm_img">
                        <img src="http://via.placeholder.com/40x40" alt="">
                    </div>
                    <div class="comment_box">
                        <form>
                            <input type="text" placeholder="Post a comment">
                            <button type="submit">Send</button>
                        </form>
                    </div>
                </div><!--post-comment end-->
            </div><!--comment-section end-->
        </div><!--posty end-->
        <div class="process-comm">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div><!--process-comm end-->
    </div><!--posts-section end-->
</div><!--main-ws-sec end-->