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
            <li class="active">Register Page</li>
        </ol>
    </div>
</div>

<div class="register">
    <div class="container">
        <h2>Register Here</h2>
        <div class="login-form-grids">
            <h5>profile information</h5>
            <form action="{{ route('site.post.register') }}" method="post">
                @csrf
                
                <div class="form-group">
                    <input type="text" placeholder="Full Name..." name="name" value="{{ old('name') }}"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}">
                    @if ($errors->has('name'))
                        <span id="exampleInputPassword1-error" class="invalid-feedback">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Phone..." name="phone" value="{{ old('phone') }}"
                        class="{{ $errors->has('phone') ? 'is-invalid' : ''}}">
                    @if ($errors->has('phone'))
                        <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Address..." name="address" value="{{ old('address') }}"
                        class="{{ $errors->has('address') ? 'is-invalid' : ''}}">
                    @if ($errors->has('address'))
                        <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('address') }}</span>
                    @endif
                </div>
   
            {{-- <div class="register-check-box">
                <div class="check">
                    <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Subscribe to Newsletter</label>
                </div>
            </div> --}}
                <h6>Login information</h6>
 
                <input type="email" placeholder="Email Address" name="email" value="{{ old('email') }}"
                    class="{{ $errors->has('email') ? 'is-invalid' : ''}}">
                @if ($errors->has('email'))
                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('email') }}</span>
                @endif
                <input type="password" placeholder="Password" name="password" value="{{ old('password') }}"
                    class="{{ $errors->has('password') ? 'is-invalid' : ''}}">
                @if ($errors->has('password'))
                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('password') }}</span>
                @endif
                <input type="password" placeholder="Password Confirmation" name="password_confirm" value="{{ old('password_confirm') }}"
                    class="{{ $errors->has('password_confirm') ? 'is-invalid' : ''}}">
                @if ($errors->has('password_confirm'))
                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('password_confirm') }}</span>
                @endif
                {{-- <div class="register-check-box">
                    <div class="check">
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>I accept the terms and conditions</label>
                    </div>
                </div> --}}
                <input type="submit" value="Register">
            </form>
        </div>
        <div class="register-home">
            <a href="{{ route('site.home') }}">Home</a>
        </div>
    </div>
</div>
@endsection

@section('script')
 
@endsection
