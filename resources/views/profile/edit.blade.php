@extends('layouts.app')

@section('content')

<section class="cover-sec">
    <img src="http://via.placeholder.com/1600x400" alt="">
    <a href="#" title=""><i class="fa fa-camera"></i> Change Image</a>
</section>

<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="main-left-sidebar">
                            <div class="user_profile">
                                <livewire:upload-profile-image :is_profile_of_logged_in_user="$is_profile_of_logged_in_user" :user_profile="$user"/>
                                
                                @if (!$is_profile_of_logged_in_user)
                                    <livewire:friend-management :user_profile="$user"/>
                                @endif

                            </div><!--user_profile end-->
                            @if ($is_profile_of_logged_in_user)
                                <livewire:profile-viewers/>
                            @endif
                        </div><!--main-left-sidebar end-->
                    </div>
                    <livewire:profile-center :user="$user" :is_profile_of_logged_in_user="$is_profile_of_logged_in_user"/>
                    <div class="col-lg-3">
                        <div class="right-sidebar">
                            <div class="message-btn">
                                <a href="{{ route('conversations.createOpenConversation', ['participant_one' => auth()->id(), 'participant_two' => $user->id] ) }}" title="Message"><i class="fa fa-envelope"></i> Message</a>
                            </div>
                            <div class="widget widget-portfolio">
                                <div class="wd-heady">
                                    <h3>Portfolio</h3>
                                    <img src="{{ asset('assets/images/photo-icon.png') }}" alt="">
                                </div>
                                <div class="pf-gallery">
                                    <ul>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                        <li><a href="#" title=""><img src="http://via.placeholder.com/70x70" alt=""></a></li>
                                    </ul>
                                </div><!--pf-gallery end-->
                            </div><!--widget-portfolio end-->
                        </div><!--right-sidebar end-->
                    </div>
                </div>
            </div><!-- main-section-data end-->
        </div> 
    </div>
</main>

<footer>
    <div class="footy-sec mn no-margin">
        <div class="container">
            <ul>
                <li><a href="#" title="">Help Center</a></li>
                <li><a href="#" title="">Privacy Policy</a></li>
                <li><a href="#" title="">Community Guidelines</a></li>
                <li><a href="#" title="">Cookies Policy</a></li>
                <li><a href="#" title="">Career</a></li>
                <li><a href="#" title="">Forum</a></li>
                <li><a href="#" title="">Language</a></li>
                <li><a href="#" title="">Copyright Policy</a></li>
            </ul>
            <p><img src="{{ asset('assets/images/copy-icon2.png') }}" alt="">Copyright 2018</p>
            <img class="fl-rgt" src="{{ asset('assets/images/logo2.png') }}" alt="">
        </div>
    </div>
</footer><!--footer end-->
@endsection