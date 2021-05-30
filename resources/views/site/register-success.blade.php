@extends('site.layouts.master')

@section('title')
    SupperMarket | Danh mục sản phẩm
@endsection

@section('boostrap')

@endsection

@section('content')
{{ loadBreadCrumbs() }}

<div class="register">
    <div class="container">
        <h2>{{ __('message.success_register') }}</h2>
        <div class="register-home">
            <a href="{{ route('site.login') }}">{{ __('common.login') }}</a>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
