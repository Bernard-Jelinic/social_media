@extends('auth.login_register')

@section('login-register-content')
    <!-- register start -->
    <div class="sign_in_sec current">
        <livewire:register-user-business :countries="$countries"/>
    </div>
    <!-- register end -->
@endsection