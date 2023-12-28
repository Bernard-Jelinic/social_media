@extends('auth.login_register')

@section('login-register-content')
    <!-- register start -->
    <div class="sign_in_sec current">

        <div class="signup-tab">
            <i class="fa fa-long-arrow-left"></i>
            <h2>johndoe@example.com</h2>
            <ul>
                <li data-tab="tab-3" class="current"><a href="#" title="">User</a></li>
                <li data-tab="tab-4"><a href="#" title="">Company</a></li>
            </ul>
        </div>
        <div class="dff-tab current" id="tab-3">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                            <input type="text" id="first_name" name="first_name" placeholder="First Name" :value="old('first_name')" required autofocus autocomplete="first_name">
                            <i class="la la-user"></i>
                        </div>
                    </div>
                    <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                            <input type="text" id="last_name" name="last_name" placeholder="Last Name" :value="old('last_name')" required autofocus autocomplete="last_name">
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
        </div>
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
        </div>
    </div>
    <!-- register end -->
@endsection