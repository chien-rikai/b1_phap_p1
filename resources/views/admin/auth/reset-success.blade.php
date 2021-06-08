@extends('layouts.master_auth')

@section('title')
    SupperMarket | {{ __('common.change_password') }}
@endsection

@section('boostrap')

@endsection

@section('content')
<!-- /.login-logo -->
<div class="card">
    <div class="card-body login-card-body">
        <h4><p class="login-box-msg">{{ __('common.change_password') }}</p></h4>

        <p class="text-center">{{ __('common.success') }}</p>
        <p class="text-center"><a href="{{ route('login') }}">{{ __('common.login') }}</a></p>
    </div>

</div>
@endsection

@section('script')

@endsection
