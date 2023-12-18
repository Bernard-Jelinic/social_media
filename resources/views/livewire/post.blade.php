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
