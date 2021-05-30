@extends('site.layouts.master')

@section('title')
    SupperMarket | {{ __('common.login') }}
@endsection

@section('content')
{{ loadBreadCrumbs() }}

<div class="login">
    <div class="container">
        <h2>Login Form</h2>
        @if (Session::has('error_login'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error_login') }}
            </div>
        @endif

        <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
            <form action="{{ route('site.post.login') }}" method="POST">
                @csrf

                <input type="email" placeholder="Email Address" name="email" value="{{ old('email') }}"
                    class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}">
                @if ($errors->has('email'))
                    <span id="exampleInputPassword1-error" class="invalid-feedback">{{ $errors->first('email') }}</span>
                @endif
                <input type="password" placeholder="Password" name="password" value="{{ old('password') }}"
                    class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}">
                @if ($errors->has('password'))
                    <span id="exampleInputPassword1-error" class="invalid-feedback">{{ $errors->first('password') }}</span>
                @endif
                <div class="forgot">
                    <a href="#">Forgot Password?</a>
                </div>
                <input type="submit" value="Login">
            </form>

            {{-- <a href="javascript:void(0)" class="social-login--facebook" onclick="loginFacebook()">
                <img width="129px" height="37px" alt="facebook-login-button" src="//bizweb.dktcdn.net/assets/admin/images/login/fb-btn.svg">
            </a>

            <a href="javascript:void(0)" class="social-login--google" onclick="loginGoogle()">
                <img width="129px" height="37px" alt="google-login-button" src="//bizweb.dktcdn.net/assets/admin/images/login/gp-btn.svg">
            </a> --}}
        </div>
        <h4>For New People</h4>
        <p><a href="registered.html">Register Here</a> (Or) go back to <a href="index.html">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
    </div>
</div>
@endsection
