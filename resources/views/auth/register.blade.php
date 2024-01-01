@extends('auth.login_register')

@section('login-register-content')
    <!-- register start -->
    <livewire:register-user-business :countries="$countries"/>
    <!-- register end -->
@endsection