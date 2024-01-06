@extends('auth.login_register')

@section('login-register-content')
    <!-- register start -->
    <livewire:register-user-page :countries="$countries"/>
    <!-- register end -->
@endsection