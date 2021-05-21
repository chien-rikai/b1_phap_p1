@extends('layouts.master_auth')

@section('title')
    SupperMarket | {{ __('common.verify_code') }}
@endsection

@section('boostrap')

@endsection

@section('content')
<!-- /.login-logo -->
<div class="card">
    <div class="card-body login-card-body">
        <h4><p class="login-box-msg">{{ __('common.verify_code') }}</p></h4>

        <form action="{{ route('reset.password') }}" method="GET">
            @csrf

            <div class="input-group mb-3">
                <input type="text" class="form-control {{ $errors->has('verify') ? 'is-invalid' : ''}}"
                    name="verify">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>

                @if ($errors->has('verify'))
                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('verify') }}</span>
                @endif
            </div>
        
            <div class="row">
                <div class="col-8">
                    <a href="{{ route('forgot.password') }}" class="btn btn-default">{{ __('common.back') }}</a>
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
