@extends('layouts.app')

@section('content')

<header>
    <div class="container">
        <div class="header-data">
            <div class="logo">
                <a href="{{ route('dashboard') }}" title=""><img src="{{asset('assets/images/logo.png') }}" alt=""></a>
            </div><!--logo end-->
            <div class="search-bar">
                <form>
                    <input type="text" name="search" placeholder="Search...">
                    <button type="submit"><i class="la la-search"></i></button>
                </form>
            </div><!--search-bar end-->
            <nav>
                <ul>
                    <li>
                        <a href="{{ route('dashboard') }}" title="">
                            <span><img src="{{asset('assets/images/icon1.png') }}" alt=""></span>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="companies.html" title="">
                            <span><img src="{{asset('assets/images/icon2.png') }}" alt=""></span>
                            Companies
                        </a>
                        <ul>
                            <li><a href="companies.html" title="">Companies</a></li>
                            <li><a href="company-profile.html" title="">Company Profile</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="projects.html" title="">
                            <span><img src="{{asset('assets/images/icon3.png') }}" alt=""></span>
                            Projects
                        </a>
                    </li>
                    <li>
                        <a href="profiles.html" title="">
                            <span><img src="{{asset('assets/images/icon4.png') }}" alt=""></span>
                            Profiles
                        </a>
                        <ul>
                            <li><a href="user-profile.html" title="">User Profile</a></li>
                            <li><a href="my-profile-feed.html" title="">my-profile-feed</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="jobs.html" title="">
                            <span><img src="{{asset('assets/images/icon5.png') }}" alt=""></span>
                            Jobs
                        </a>
                    </li>
                    <li>
                        <a href="#" title="" class="not-box-open">
                            <span><img src="{{asset('assets/images/icon6.png') }}" alt=""></span>
                            Messages
                        </a>
                        <div class="notification-box msg">
                            <div class="nt-title">
                                <h4>Setting</h4>
                                <a href="#" title="">Clear all</a>
                            </div>
                            <div class="nott-list">
                                <div class="notfication-details">
                                      <div class="noty-user-img">
                                          <img src="{{asset('assets/images/resources/ny-img1.png') }}" alt="tttttttttttttt">
                                      </div>
                                      <div class="notification-info">
                                          <h3><a href="messages.html" title="">Jassica William</a> </h3>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
                                          <span>2 min ago</span>
                                      </div><!--notification-info -->
                                  </div>
                                  <div class="notfication-details">
                                      <div class="noty-user-img">
                                          <img src="{{asset('assets/images/resources/ny-img2.png') }}" alt="ttttttttttttttttttt">
                                      </div>
                                      <div class="notification-info">
                                          <h3><a href="messages.html" title="">Jassica William</a></h3>
                                          <p>Lorem ipsum dolor sit amet.</p>
                                          <span>2 min ago</span>
                                      </div><!--notification-info -->
                                  </div>
                                  <div class="notfication-details">
                                      <div class="noty-user-img">
                                          <img src="{{asset('assets/images/resources/ny-img3.png') }}" alt="ttttttttttttttttttttttttt">
                                      </div>
                                      <div class="notification-info">
                                          <h3><a href="messages.html" title="">Jassica William</a></h3>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo incididunt ut labore et dolore magna aliqua.</p>
                                          <span>2 min ago</span>
                                      </div><!--notification-info -->
                                  </div>
                                  <div class="view-all-nots">
                                      <a href="messages.html" title="">View All Messsages</a>
                                  </div>
                            </div><!--nott-list end-->
                        </div><!--notification-box end-->
                    </li>
                    <li>
                        <a href="#" title="" class="not-box-open">
                            <span><img src="{{asset('assets/images/icon7.png') }}" alt=""></span>
                            Notification
                        </a>
                        <div class="notification-box">
                            <div class="nt-title">
                                <h4>Setting</h4>
                                <a href="#" title="">Clear all</a>
                            </div>
                            <div class="nott-list">
                                <div class="notfication-details">
                                      <div class="noty-user-img">
                                          <img src="{{asset('assets/images/resources/ny-img1.png') }}" alt="">
                                      </div>
                                      <div class="notification-info">
                                          <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                          <span>2 min ago</span>
                                      </div><!--notification-info -->
                                  </div>
                                  <div class="notfication-details">
                                      <div class="noty-user-img">
                                          <img src="{{asset('assets/images/resources/ny-img2.png') }}" alt="">
                                      </div>
                                      <div class="notification-info">
                                          <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                          <span>2 min ago</span>
                                      </div><!--notification-info -->
                                  </div>
                                  <div class="notfication-details">
                                      <div class="noty-user-img">
                                          <img src="{{asset('assets/images/resources/ny-img3.png') }}" alt="">
                                      </div>
                                      <div class="notification-info">
                                          <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                          <span>2 min ago</span>
                                      </div><!--notification-info -->
                                  </div>
                                  <div class="notfication-details">
                                      <div class="noty-user-img">
                                          <img src="{{asset('assets/images/resources/ny-img2.png') }}" alt="">
                                      </div>
                                      <div class="notification-info">
                                          <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                          <span>2 min ago</span>
                                      </div><!--notification-info -->
                                  </div>
                                  <div class="view-all-nots">
                                      <a href="#" title="">View All Notification</a>
                                  </div>
                            </div><!--nott-list end-->
                        </div><!--notification-box end-->
                    </li>
                </ul>
            </nav><!--nav end-->
            <div class="menu-btn">
                <a href="#" title=""><i class="fa fa-bars"></i></a>
            </div><!--menu-btn end-->
            <div class="user-account">
                <div class="user-info">
                    <img src="http://via.placeholder.com/30x30" alt="">
                    <a href="#" title="">John</a>
                    <i class="la la-sort-down"></i>
                </div>
                <div class="user-account-settingss">
                    <h3>Online Status</h3>
                    <ul class="on-off-status">
                        <li>
                            <div class="fgt-sec">
                                <input type="radio" name="cc" id="c5">
                                <label for="c5">
                                    <span></span>
                                </label>
                                <small>Online</small>
                            </div>
                        </li>
                        <li>
                            <div class="fgt-sec">
                                <input type="radio" name="cc" id="c6">
                                <label for="c6">
                                    <span></span>
                                </label>
                                <small>Offline</small>
                            </div>
                        </li>
                    </ul>
                    <h3>Custom Status</h3>
                    <div class="search_form">
                        <form>
                            <input type="text" name="search">
                            <button type="submit">Ok</button>
                        </form>
                    </div><!--search_form end-->
                    <h3>Setting</h3>
                    <ul class="us-links">
                        <li><a href="profile-account-setting.html" title="">Account Setting</a></li>
                        <li><a href="#" title="">Privacy</a></li>
                        <li><a href="#" title="">Faqs</a></li>
                        <li><a href="#" title="">Terms & Conditions</a></li>
                    </ul>
                    <h3 class="tc">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
        
                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </h3>
                </div><!--user-account-settingss end-->
            </div>
        </div><!--header-data end-->
    </div>
</header><!--header end-->

<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                        <!--main-left-sidebar start-->
                        <div class="main-left-sidebar no-margin">
                            <div class="user-data full-width">
                                <div class="user-profile">
                                    <div class="username-dt">
                                        <div class="usr-pic">
                                            <img src="http://via.placeholder.com/100x100" alt="">
                                        </div>
                                    </div><!--username-dt end-->
                                    <div class="user-specs">
                                        <h3>{{ Auth::user()->first_name . Auth::user()->last_name }}</h3>
                                        @if ( Auth::user()->headline )
                                            <span>{{ Auth::user()->headline }}</span>
                                        @endif
                                    </div>
                                </div><!--user-profile end-->
                                <ul class="user-fw-status">
                                    <li>
                                        <h4>Following</h4>
                                        <span>34</span>
                                    </li>
                                    <li>
                                        <h4>Followers</h4>
                                        <span>155</span>
                                    </li>
                                    <li>
                                        <a href="{{ route('profile.edit') }}" title="">View Profile</a>
                                    </li>
                                </ul>
                            </div><!--user-data end-->
                            <div class="suggestions full-width">
                                <div class="sd-title">
                                    <h3>Suggestions</h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div><!--sd-title end-->
                                <div class="suggestions-list">
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>Jessica William</h4>
                                            <span>Graphic Designer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>John Doe</h4>
                                            <span>PHP Developer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>Poonam</h4>
                                            <span>Wordpress Developer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>Bill Gates</h4>
                                            <span>C & C++ Developer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>Jessica William</h4>
                                            <span>Graphic Designer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>John Doe</h4>
                                            <span>PHP Developer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="view-more">
                                        <a href="#" title="">View More</a>
                                    </div>
                                </div><!--suggestions-list end-->
                            </div><!--suggestions end-->
                            <div class="tags-sec full-width">
                                <ul>
                                    <li><a href="#" title="">Help Center</a></li>
                                    <li><a href="#" title="">About</a></li>
                                    <li><a href="#" title="">Privacy Policy</a></li>
                                    <li><a href="#" title="">Community Guidelines</a></li>
                                    <li><a href="#" title="">Cookies Policy</a></li>
                                    <li><a href="#" title="">Career</a></li>
                                    <li><a href="#" title="">Language</a></li>
                                    <li><a href="#" title="">Copyright Policy</a></li>
                                </ul>
                                <div class="cp-sec">
                                    <img src="{{asset('assets/images/logo2.png') }}" alt="">
                                    <p><img src="{{asset('assets/images/cp.png') }}" alt="">Copyright 2018</p>
                                </div>
                            </div><!--tags-sec end-->
                        </div><!--main-left-sidebar end-->
                    </div>
                    <div class="col-lg-6 col-md-8 no-pd">
                        <livewire:dashboard-post />
                    </div>
                    <div class="col-lg-3 pd-right-none no-pd">
                        <div class="right-sidebar">
                            <div class="widget widget-about">
                                <img src="{{asset('assets/images/wd-logo.png') }}" alt="">
                                <h3>Track Time on Workwise</h3>
                                <span>Pay only for the Hours worked</span>
                                <div class="sign_link">
                                    <h3><a href="#" title="">Sign up</a></h3>
                                    <a href="#" title="">Learn More</a>
                                </div>
                            </div><!--widget-about end-->
                            <div class="widget widget-jobs">
                                <div class="sd-title">
                                    <h3>Top Jobs</h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div>
                                <div class="jobs-list">
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Senior Product Designer</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div><!--job-info end-->
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Senior UI / UX Designer</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div><!--job-info end-->
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Junior Seo Designer</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div><!--job-info end-->
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Senior PHP Designer</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div><!--job-info end-->
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Senior Developer Designer</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div><!--job-info end-->
                                </div><!--jobs-list end-->
                            </div><!--widget-jobs end-->
                            <div class="widget widget-jobs">
                                <div class="sd-title">
                                    <h3>Most Viewed This Week</h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div>
                                <div class="jobs-list">
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Senior Product Designer</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div><!--job-info end-->
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Senior UI / UX Designer</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div><!--job-info end-->
                                    <div class="job-info">
                                        <div class="job-details">
                                            <h3>Junior Seo Designer</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
                                        </div>
                                    </div><!--job-info end-->
                                </div><!--jobs-list end-->
                            </div><!--widget-jobs end-->
                            <div class="widget suggestions full-width">
                                <div class="sd-title">
                                    <h3>Most Viewed People</h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div><!--sd-title end-->
                                <div class="suggestions-list">
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>Jessica William</h4>
                                            <span>Graphic Designer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>John Doe</h4>
                                            <span>PHP Developer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>Poonam</h4>
                                            <span>Wordpress Developer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>Bill Gates</h4>
                                            <span>C &amp; C++ Developer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>Jessica William</h4>
                                            <span>Graphic Designer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="suggestion-usd">
                                        <img src="http://via.placeholder.com/35x35" alt="">
                                        <div class="sgt-text">
                                            <h4>John Doe</h4>
                                            <span>PHP Developer</span>
                                        </div>
                                        <span><i class="la la-plus"></i></span>
                                    </div>
                                    <div class="view-more">
                                        <a href="#" title="">View More</a>
                                    </div>
                                </div><!--suggestions-list end-->
                            </div>
                        </div><!--right-sidebar end-->
                    </div>
                </div>
            </div><!-- main-section-data end-->
        </div> 
    </div>
</main>

<div class="post-popup pst-pj">
    <div class="post-project">
        <h3>Post a project</h3>
        <div class="post-project-fields">
            <form>
                <div class="row">
                    <div class="col-lg-12">
                        <input type="text" name="title" placeholder="Title">
                    </div>
                    <div class="col-lg-12">
                        <div class="inp-field">
                            <select>
                                <option>Category</option>
                                <option>Category 1</option>
                                <option>Category 2</option>
                                <option>Category 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <input type="text" name="skills" placeholder="Skills">
                    </div>
                    <div class="col-lg-12">
                        <div class="price-sec">
                            <div class="price-br">
                                <input type="text" name="price1" placeholder="Price">
                                <i class="la la-dollar"></i>
                            </div>
                            <span>To</span>
                            <div class="price-br">
                                <input type="text" name="price1" placeholder="Price">
                                <i class="la la-dollar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <textarea name="description" placeholder="Description"></textarea>
                    </div>
                    <div class="col-lg-12">
                        <ul>
                            <li><button class="active" type="submit" value="post">Post</button></li>
                            <li><a href="#" title="">Cancel</a></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div><!--post-project-fields end-->
        <a href="#" title=""><i class="la la-times-circle-o"></i></a>
    </div><!--post-project end-->
</div><!--post-project-popup end-->

<div class="post-popup job_post">
    <div class="post-project">
        <h3>Post a job</h3>
        <div class="post-project-fields">
            <form>
                <div class="row">
                    <div class="col-lg-12">
                        <input type="text" name="title" placeholder="Title">
                    </div>
                    <div class="col-lg-12">
                        <div class="inp-field">
                            <select>
                                <option>Category</option>
                                <option>Category 1</option>
                                <option>Category 2</option>
                                <option>Category 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <input type="text" name="skills" placeholder="Skills">
                    </div>
                    <div class="col-lg-6">
                        <div class="price-br">
                            <input type="text" name="price1" placeholder="Price">
                            <i class="la la-dollar"></i>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="inp-field">
                            <select>
                                <option>Full Time</option>
                                <option>Half time</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <textarea name="description" placeholder="Description"></textarea>
                    </div>
                    <div class="col-lg-12">
                        <ul>
                            <li><button class="active" type="submit" value="post">Post</button></li>
                            <li><a href="#" title="">Cancel</a></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div><!--post-project-fields end-->
        <a href="#" title=""><i class="la la-times-circle-o"></i></a>
    </div><!--post-project end-->
</div><!--post-project-popup end-->

<div class="chatbox-list">
    <div class="chatbox">
        <div class="chat-mg">
            <a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a>
            <span>2</span>
        </div>
        <div class="conversation-box">
            <div class="con-title mg-3">
                <div class="chat-user-info">
                    <img src="http://via.placeholder.com/34x33" alt="">
                    <h3>John Doe <span class="status-info"></span></h3>
                </div>
                <div class="st-icons">
                    <a href="#" title=""><i class="la la-cog"></i></a>
                    <a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
                    <a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
                </div>
            </div>
            <div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">
                <div class="chat-msg">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
                    <span>Sat, Aug 23, 1:10 PM</span>
                </div>
                <div class="date-nd">
                    <span>Sunday, August 24</span>
                </div>
                <div class="chat-msg st2">
                    <p>Cras ultricies ligula.</p>
                    <span>5 minutes ago</span>
                </div>
                <div class="chat-msg">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
                    <span>Sat, Aug 23, 1:10 PM</span>
                </div>
            </div><!--chat-list end-->
            <div class="typing-msg">
                <form>
                    <textarea placeholder="Type a message here"></textarea>
                    <button type="submit"><i class="fa fa-send"></i></button>
                </form>
                <ul class="ft-options">
                    <li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
                    <li><a href="#" title=""><i class="la la-camera"></i></a></li>
                    <li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
                </ul>
            </div><!--typing-msg end-->
        </div><!--chat-history end-->
    </div>
    <div class="chatbox">
        <div class="chat-mg">
            <a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a>
        </div>
        <div class="conversation-box">
            <div class="con-title mg-3">
                <div class="chat-user-info">
                    <img src="http://via.placeholder.com/34x33" alt="">
                    <h3>John Doe <span class="status-info"></span></h3>
                </div>
                <div class="st-icons">
                    <a href="#" title=""><i class="la la-cog"></i></a>
                    <a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
                    <a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
                </div>
            </div>
            <div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">
                <div class="chat-msg">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
                    <span>Sat, Aug 23, 1:10 PM</span>
                </div>
                <div class="date-nd">
                    <span>Sunday, August 24</span>
                </div>
                <div class="chat-msg st2">
                    <p>Cras ultricies ligula.</p>
                    <span>5 minutes ago</span>
                </div>
                <div class="chat-msg">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
                    <span>Sat, Aug 23, 1:10 PM</span>
                </div>
            </div><!--chat-list end-->
            <div class="typing-msg">
                <form>
                    <textarea placeholder="Type a message here"></textarea>
                    <button type="submit"><i class="fa fa-send"></i></button>
                </form>
                <ul class="ft-options">
                    <li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
                    <li><a href="#" title=""><i class="la la-camera"></i></a></li>
                    <li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
                </ul>
            </div><!--typing-msg end-->
        </div><!--chat-history end-->
    </div>
    <div class="chatbox">
        <div class="chat-mg bx">
            <a href="#" title=""><img src="{{asset('assets/images/chat.png') }}" alt=""></a>
            <span>2</span>
        </div>
        <div class="conversation-box">
            <div class="con-title">
                <h3>Messages</h3>
                <a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
            </div>
            <div class="chat-list">
                <div class="conv-list active">
                    <div class="usrr-pic">
                        <img src="http://via.placeholder.com/50x50" alt="">
                        <span class="active-status activee"></span>
                    </div>
                    <div class="usy-info">
                        <h3>John Doe</h3>
                        <span>Lorem ipsum dolor <img src="{{asset('assets/images/smley.png') }}" alt=""></span>
                    </div>
                    <div class="ct-time">
                        <span>1:55 PM</span>
                    </div>
                    <span class="msg-numbers">2</span>
                </div>
                <div class="conv-list">
                    <div class="usrr-pic">
                        <img src="http://via.placeholder.com/50x50" alt="">
                    </div>
                    <div class="usy-info">
                        <h3>John Doe</h3>
                        <span>Lorem ipsum dolor <img src="{{asset('assets/images/smley.png') }}" alt=""></span>
                    </div>
                    <div class="ct-time">
                        <span>11:39 PM</span>
                    </div>
                </div>
                <div class="conv-list">
                    <div class="usrr-pic">
                        <img src="http://via.placeholder.com/50x50" alt="">
                    </div>
                    <div class="usy-info">
                        <h3>John Doe</h3>
                        <span>Lorem ipsum dolor <img src="{{asset('assets/images/smley.png') }}" alt=""></span>
                    </div>
                    <div class="ct-time">
                        <span>0.28 AM</span>
                    </div>
                </div>
            </div><!--chat-list end-->
        </div><!--conversation-box end-->
    </div>
</div><!--chatbox-list end-->

@endsection