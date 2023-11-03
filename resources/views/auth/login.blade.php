@extends('layouts.app')

@section('content')

    <div class="sign-in-page">
        <div class="signin-popup">
            <div class="signin-pop">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cmp-info">
                            <div class="cm-logo">
                                <!--<img src="{{ asset('assets/images/remote-connections_3.jpg') }}" alt="Application Logo">-->
                                <p>Connect with friends and the world around you.</p>
                            </div><!--cm-logo end-->
                            <img src="{{asset('assets/images/cm-main-img.png') }}" alt="">
                        </div><!--cmp-info end-->
                    </div>
                    <div class="col-lg-6">
                        <div class="login-sec">
                            <ul class="sign-control">
                                <li data-tab="tab-1" class="current"><a href="#" title="">Sign in</a></li>
                                <li data-tab="tab-2"><a href="#" title="">Sign up</a></li>
                            </ul>
                            <div class="sign_in_sec current" id="tab-1">

                                <h3>Sign in</h3>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input type="email" name="email" placeholder="Email" :value="old('email')" required autofocus autocomplete="username">
                                                <i class="la la-envelope"></i>
                                            </div><!--sn-field end-->
                                        </div>

                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input id="password" type="password" name="password" placeholder="Password" required autocomplete="current-password">
                                                <i class="la la-lock"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="checky-sec">
                                                <!-- Remember Me start -->
                                                <div class="fgt-sec">
                                                    <input type="checkbox" name="remember" id="remember_me">
                                                    <label for="remember_me">
                                                        <span></span>
                                                    </label>
                                                    <small>Remember me</small>
                                                </div><!--fgt-sec end-->
                                                <!-- Remember Me end -->
                                                <a href="{{ route('password.request') }}" title="">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <button type="submit" value="submit">Sign in</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!--sign_in_sec end-->
                            <div class="sign_in_sec" id="tab-2">
                                <div class="signup-tab">
                                    <i class="fa fa-long-arrow-left"></i>
                                    <h2>johndoe@example.com</h2>
                                    <ul>
                                        <li data-tab="tab-3" class="current"><a href="#" title="">User</a></li>
                                        <li data-tab="tab-4"><a href="#" title="">Company</a></li>
                                    </ul>
                                </div><!--signup-tab end-->
                                <div class="dff-tab current" id="tab-3">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="text" id="name" name="name" placeholder="Full Name" :value="old('name')" required autofocus autocomplete="name">
                                                    <i class="la la-user"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="email" id="email" name="email" placeholder="Email" :value="old('email')" required autofocus autocomplete="username">
                                                    <i class="la la-envelope"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="text" name="country" placeholder="Country">
                                                    <i class="la la-globe"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <select>
                                                        <option>Category</option>
                                                    </select>
                                                    <i class="la la-dropbox"></i>
                                                    <span><i class="fa fa-ellipsis-h"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="password" id="password" name="password" placeholder="Password" required autocomplete="new-password">
                                                    <i class="la la-lock"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                                        placeholder="Repeat Password" required autocomplete="new-password">
                                                    <i class="la la-lock"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <button type="submit" value="submit">Get Started</button>
                                            </div>
                                        </div>
                                    </form>
                                </div><!--dff-tab end-->
                                <div class="dff-tab" id="tab-4">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="text" id="name" name="name" placeholder="Full Name" :value="old('name')" required autofocus autocomplete="name">
                                                    <i class="la la-user"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="text" name="company-name"
                                                        placeholder="Company Name">
                                                    <i class="la la-building"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="text" name="country" placeholder="Country">
                                                    <i class="la la-globe"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="password" id="password" name="password" placeholder="Password" required autocomplete="new-password">
                                                    <i class="la la-lock"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                                        placeholder="Repeat Password" required autocomplete="new-password">
                                                    <i class="la la-lock"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <button type="submit" value="submit">Get Started</button>
                                            </div>
                                        </div>
                                    </form>
                                </div><!--dff-tab end-->
                            </div>
                        </div><!--login-sec end-->
                    </div>
                </div>
            </div><!--signin-pop end-->
        </div><!--signin-popup end-->
        <div class="footy-sec">
            <div class="container">
                <!--<ul>
                    <li><a href="#" title="">Help Center</a></li>
                    <li><a href="#" title="">Privacy Policy</a></li>
                    <li><a href="#" title="">Community Guidelines</a></li>
                    <li><a href="#" title="">Cookies Policy</a></li>
                    <li><a href="#" title="">Career</a></li>
                    <li><a href="#" title="">Forum</a></li>
                    <li><a href="#" title="">Language</a></li>
                    <li><a href="#" title="">Copyright Policy</a></li>
                </ul>-->
                <p><img src="{{ asset('assets/images/copy-icon.png') }}" alt="">Copyright <?php echo date('Y'); ?></p>
            </div>
        </div><!--footy-sec end-->
    </div><!--sign-in-page end-->