@extends('layouts.master_auth')

@section('title')
<<<<<<< HEAD
    SupperMarket | {{ __('common.login') }}
=======
    SupperMarket | Đăng nhập
>>>>>>> ba0add2 (build_auth_admin_module)
@endsection

@section('boostrap')

@endsection

@section('content')
<!-- /.login-logo -->
<div class="card">
    <div class="card-body login-card-body">
<<<<<<< HEAD
        <h4><p class="login-box-msg">{{ __('common.login') }}</p></h4>

        @if (Session::has('error_login'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error_login') }}
            </div>
        @endif
=======
        <p class="login-box-msg">Sign in to start your session</p>
>>>>>>> ba0add2 (build_auth_admin_module)

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
<<<<<<< HEAD
                    <a href="{{ route('forgot.password') }}">{{ __('common.forgot_password') }}</a>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('common.send') }}</button>
=======
                    {{-- <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                            Remember Me
                        </label>
                    </div> --}}
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
>>>>>>> ba0add2 (build_auth_admin_module)
                </div>
                <!-- /.col -->
            </div>
        </form>

<<<<<<< HEAD
        {{-- <div class="social-auth-links text-center mb-3">
=======
        <div class="social-auth-links text-center mb-3">
>>>>>>> ba0add2 (build_auth_admin_module)
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
            </a>
<<<<<<< HEAD
        </div> --}}
        <!-- /.social-auth-links -->

        {{-- <p class="mb-1">
            <a href="{{ route('forgot.password') }}">{{ __('common.forgot_password') }}</a>
        </p> --}}
        {{-- <p class="mb-0">
            <a href="register.html" class="text-center">Register a new membership</a>
        </p> --}}
=======
        </div>
        <!-- /.social-auth-links -->

        <p class="mb-1">
            <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
            <a href="register.html" class="text-center">Register a new membership</a>
        </p>
>>>>>>> ba0add2 (build_auth_admin_module)
    </div>
    <!-- /.login-card-body -->
</div>
@endsection

@section('script')

@endsection
