@extends('layouts.master_auth')

@section('title')
    SupperMarket | {{ __('common.login') }}
@endsection

@section('content')
<!-- /.login-logo -->
<div class="card">
    <div class="card-body login-card-body">
        <h4><p class="login-box-msg">{{ __('common.login') }}</p></h4>

        @if (Session::has('error_login'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error_login') }}
            </div>
        @endif

        <form action="{{ route('post.login') }}" method="post">
            @csrf

            <div class="input-group mb-3">
                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}"
                    name="email" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>

                @if ($errors->has('email'))
                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}"
                    name="password" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>

                @if ($errors->has('password'))
                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="row">
                <div class="col-8">
                    <a href="{{ route('forgot.password') }}">{{ __('common.forgot_password') }}</a>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('common.send') }}</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
            <a href="{{ route('auth.social.redirect', ['provider' => 'facebook']) }}" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i> {{ __('common.facebook_login') }}
            </a>
            <a href="{{ route('auth.social.redirect', ['provider' => 'google']) }}" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> {{ __('common.google_login') }}
            </a>
        </div>
        <!-- /.social-auth-links -->

        {{-- <p class="mb-1">
            <a href="{{ route('forgot.password') }}">{{ __('common.forgot_password') }}</a>
        </p> --}}
        {{-- <p class="mb-0">
            <a href="register.html" class="text-center">Register a new membership</a>
        </p> --}}
    </div>
    <!-- /.login-card-body -->
</div>
@endsection

