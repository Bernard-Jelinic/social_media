@extends('auth.login_register')

@section('login-register-content')
    <!-- login start -->
    <div class="sign_in_sec current">

        <h3>Sign in</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row">
                <div class="col-lg-12 no-pdd">
                    <div class="sn-field">
                        <input type="email" name="email" placeholder="Email" :value="old('email')" required autofocus autocomplete="username">
                        <i class="la la-envelope"></i>
                    </div>
                </div>

                <div class="col-lg-12 no-pdd">
                    <div class="sn-field">
                        <input id="password" type="password" name="password" placeholder="Password" required autocomplete="current-password">
                        <i class="la la-lock"></i>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <div class="checky-sec">
                        <div class="fgt-sec">
                            <input type="checkbox" name="remember" id="remember_me">
                            <label for="remember_me">
                                <span></span>
                            </label>
                            <small>Remember me</small>
                        </div>
                        <a href="{{ route('password.request') }}" title="">Forgot Password?</a>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <button type="submit" value="submit">Sign in</button>
                </div>
            </div>
        </form>
    </div>
    <!-- login end -->
@endsection