@extends('auth.login_register')

@section('login-register-content')
    <!-- register start -->
    <div class="sign_in_sec current">

        <div class="signup-tab">
            <ul>
                <li data-tab="tab-3" class="current"><a href="#" title="">User</a></li>
                <li data-tab="tab-4"><a href="#" title="">Business Page</a></li>
            </ul>
        </div>
        <div class="dff-tab current" id="tab-3">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    @error('first_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                            <input type="text" id="first_name" name="first_name" placeholder="First Name" :value="old('first_name')" required autofocus autocomplete="first_name">
                            <i class="la la-user"></i>
                        </div>
                    </div>
                    @error('last_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                            <input type="text" id="last_name" name="last_name" placeholder="Last Name" :value="old('last_name')" required autofocus autocomplete="last_name">
                            <i class="la la-user"></i>
                        </div>
                    </div>
                    @error('headline')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                            <input type="text" name="headline" placeholder="Headline">
                            <i class="la la-dropbox"></i>
                        </div>
                    </div>
                    @error('country_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                            <select name="country_id">
                                <option value="null">Select country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            <i class="la la-globe"></i>
                        </div>
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-lg-12 no-pdd">
                        <div class="sn-field">
                            <input type="email" id="email" name="email" placeholder="Email" required autofocus autocomplete="username">
                            <i class="la la-envelope"></i>
                        </div>
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
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
                        <button type="submit" value="submit">Register</button>
                    </div>
                </div>
            </form>
        </div>
        <livewire:register-page :countries="$countries"/>
    </div>
    <!-- register end -->
@endsection