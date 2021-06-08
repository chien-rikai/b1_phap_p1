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

        @if (Session::has('error_change_pass'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error_change_pass') }}
            </div>
        @endif

        <form action="{{ route('reset') }}" method="POST">
            @csrf

            <div class="input-group mb-3">
                <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}"
                    name="password" placeholder="{{ __('common.place_password') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-pencil-alt"></span>
                    </div>
                </div>

                @if ($errors->has('password'))
                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="input-group mb-3">
                <input type="password" class="form-control {{ $errors->has('password_confirm') ? 'is-invalid' : ''}}"
                    name="password_confirm" placeholder="{{ __('common.place_password_confirm') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-pencil-alt"></span>
                    </div>
                </div>

                @if ($errors->has('password_confirm'))
                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('password_confirm') }}</span>
                @endif
            </div>
        
            <div class="row">
                <div class="col-8">
                    <a href="{{ route('login') }}" class="btn btn-default">{{ __('common.back') }}</a>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    
                    <button type="submit" class="btn btn-primary btn-block">{{ __('common.send') }}</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>

</div>
@endsection

@section('script')

@endsection
