@extends('layouts.app')

@section('content')
    <div class="sign-in-page">
        <div class="signin-popup">
            <div class="signin-pop">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cmp-info">
                            <div class="cm-logo">
                                <p>Connect with friends and the world around you.</p>
                            </div>
                            <img src="{{asset('assets/images/cm-main-img.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="login-sec">
                            <ul class="sign-control">
                                <li data-tab="tab-1" class="{{ Route::is('login') ? 'current' : '' }}">
                                    <a href="{{ route('login') }}" title="">Sign in</a>
                                </li>
                                <li data-tab="tab-2" class="{{ Route::is('register') ? 'current' : '' }}">
                                    <a href="{{ route('register') }}" title="">Sign up</a>
                                </li>
                            </ul>
                            @yield('login-register-content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footy-sec">
            <div class="container">
                <p><img src="{{ asset('assets/images/copy-icon.png') }}" alt="">Copyright <?php echo date('Y'); ?></p>
            </div>
        </div>
    </div>