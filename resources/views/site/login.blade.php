@extends('site.layouts.master')

@section('title')
    SupperMarket | Danh mục sản phẩm
@endsection

@section('boostrap')

@endsection

@section('content')
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Login Page</li>
        </ol>
    </div>
</div>

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
        </div>
        <h4>For New People</h4>
        <p><a href="registered.html">Register Here</a> (Or) go back to <a href="index.html">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
    </div>
</div>
@endsection

@section('script')
 
@endsection
