@extends('site.layouts.master')

@section('title')
SupperMarket | {{ __('common.payment') }}
@endsection

@section('content')
{{ loadBreadCrumbs() }}

<div class="checkout">
    <div class="container">
        <div class="card">
            @include('site.layouts.form-payment')
        </div>
    </div>
</div>
@endsection
