@extends('layouts.app')

@section('content')

    @include('partials.header')

    <section class="messages-page">
        <div class="container">
            <div class="messages-sec">
                <div class="row">
                    <div class="col-lg-4 col-md-12 no-pdd">
                        <div class="msgs-list">
                            <div class="msg-title">
                                <h3>Messages</h3>
                                <ul>
                                    <li><a href="#" title=""><i class="fa fa-cog"></i></a></li>
                                    <li><a href="#" title=""><i class="fa fa-ellipsis-v"></i></a></li>
                                </ul>
                            </div><!--msg-title end-->
                            <div class="messages-list">
                                <ul>
                                    <li class="active">
                                        <div class="usr-msg-details">
                                            <div class="usr-ms-img">
                                                <img src="http://via.placeholder.com/50x50" alt="">
                                                <span class="msg-status"></span>
                                            </div>
                                            <div class="usr-mg-info">
                                                <h3>John Doe</h3>
                                                <p>Lorem ipsum dolor <img src="images/smley.png" alt=""></p>
                                            </div><!--usr-mg-info end-->
                                            <span class="posted_time">1:55 PM</span>
                                            <span class="msg-notifc">1</span>
                                        </div><!--usr-msg-details end-->
                                    </li>
                                    <li>
                                        <div class="usr-msg-details">
                                            <div class="usr-ms-img">
                                                <img src="http://via.placeholder.com/50x50" alt="">
                                            </div>
                                            <div class="usr-mg-info">
                                                <h3>David Vane</h3>
                                                <p>Vestibulum ac diam..</p>
                                            </div><!--usr-mg-info end-->
                                            <span class="posted_time">1:55 PM</span>
                                        </div><!--usr-msg-details end-->
                                    </li>
                                    <li>
                                        <div class="usr-msg-details">
                                            <div class="usr-ms-img">
                                                <img src="http://via.placeholder.com/50x50" alt="">
                                            </div>
                                            <div class="usr-mg-info">
                                                <h3>Nancy Dilan</h3>
                                                <p>Quam vehicula.</p>
                                            </div><!--usr-mg-info end-->
                                            <span class="posted_time">1:55 PM</span>
                                        </div><!--usr-msg-details end-->
                                    </li>
                                    <li>
                                        <div class="usr-msg-details">
                                            <div class="usr-ms-img">
                                                <img src="http://via.placeholder.com/50x50" alt="">
                                                <span class="msg-status"></span>
                                            </div>
                                            <div class="usr-mg-info">
                                                <h3>Norman Kenney</h3>
                                                <p>Nulla quis lorem ut..</p>
                                            </div><!--usr-mg-info end-->
                                            <span class="posted_time">1:55 PM</span>
                                        </div><!--usr-msg-details end-->
                                    </li>
                                    <li>
                                        <div class="usr-msg-details">
                                            <div class="usr-ms-img">
                                                <img src="http://via.placeholder.com/50x50" alt="">
                                                <span class="msg-status"></span>
                                            </div>
                                            <div class="usr-mg-info">
                                                <h3>James Dilan</h3>
                                                <p>Vivamus magna just..</p>
                                            </div><!--usr-mg-info end-->
                                            <span class="posted_time">1:55 PM</span>
                                        </div><!--usr-msg-details end-->
                                    </li>
                                    <li>
                                        <div class="usr-msg-details">
                                            <div class="usr-ms-img">
                                                <img src="http://via.placeholder.com/50x50" alt="">
                                            </div>
                                            <div class="usr-mg-info">
                                                <h3>Mike Dorn</h3>
                                                <p>Praesent sapien massa.</p>
                                            </div><!--usr-mg-info end-->
                                            <span class="posted_time">1:55 PM</span>
                                        </div><!--usr-msg-details end-->
                                    </li>
                                    <li>
                                        <div class="usr-msg-details">
                                            <div class="usr-ms-img">
                                                <img src="http://via.placeholder.com/50x50" alt="">
                                            </div>
                                            <div class="usr-mg-info">
                                                <h3>Patrick Morison</h3>
                                                <p>Convallis a pellente...</p>
                                            </div><!--usr-mg-info end-->
                                            <span class="posted_time">1:55 PM</span>
                                        </div><!--usr-msg-details end-->
                                    </li>
                                </ul>
                            </div><!--messages-list end-->
                        </div><!--msgs-list end-->
                    </div>
                    <div class="col-lg-8 col-md-12 pd-right-none pd-left-none">
                        @livewire('chat-conversation')
                    </div>
                </div>
            </div><!--messages-sec end-->
        </div>
    </section><!--messages-page end-->

    @include('partials.footer')
@endsection