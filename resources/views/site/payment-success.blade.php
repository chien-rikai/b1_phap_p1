@extends('site.layouts.master')

@section('title')
    SupperMarket | {{ __('common.payment') }}
@endsection

@section('content')
{{ loadBreadCrumbs() }}

<div class="jumbotron text-center">
    @include('site.layouts.vi.message-payment-success')
    <p class="lead">
        <a class="btn btn-primary btn-sm" href="{{ route('site.home') }}" role="button">{{ __('common.home') }}</a>
    </p>
</div>
@endsection
