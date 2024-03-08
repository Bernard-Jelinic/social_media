@extends('layouts.app')

@section('content')

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
                                        <div class="user-pro-img">
                                            <img src="{{ auth()->user()->profile_image }}" alt="Profile image">
                                        </div>
                                    </div><!--username-dt end-->
                                    <div class="user-specs">
                                        <h3>{{ Auth::user()->full_name }}</h3>
                                        @if ( !is_null(Auth::user()->headline) )
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
                            <livewire:friend-suggestions/>
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
                            <livewire:post-central is_profile_of_logged_in_user="true" :user="auth()->user()" show_top_profiles="true"/>
                        </div>
                    </div>
                    <div class="col-lg-3 pd-right-none no-pd">
                        <div class="right-sidebar">
                            <livewire:top-pages/>
                            <livewire:pages-most-view-this-week/>
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