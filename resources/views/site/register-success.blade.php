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
        <h2>Đăng kí thành công</h2>
        <div class="register-home">
            <a href="{{ route('site.home') }}">Trang chủ</a>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
