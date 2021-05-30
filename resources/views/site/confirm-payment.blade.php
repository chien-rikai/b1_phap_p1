@extends('site.layouts.master')

@section('title')
SupperMarket | {{ __('common.cart') }}
@endsection

@section('content')
{{ loadBreadCrumbs() }}

<div class="checkout">
    <div class="container">
        <h2>{{ __('common.info_customer') }}</h2>

        <p>{{ $customer[0]['name'] }}</p>
        <p>{{ $customer[0]['email'] }}</p>
        <p>{{ $customer[0]['address'] }}</p>
        <p>{{ $customer[0]['phone'] }}</p>
        
    </div>

    <div class="clearfix"> </div>

    <div class="container">
        <h2>{{ __('common.count_cart') }} <span><span id="count-products">{{ count($products) }}</span> {{ __('common.product') }}</span></h2>
        <div class="checkout-right">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>{{ __('common.product') }}</th>
                        <th>{{ __('common.amount') }}</th>
                        <th>{{ __('common.name', ['model' => __('common.product')]) }}</th>
                        <th>{{ __('common.price') }}</th>
                        <th>{{ __('common.price_promotion') }}</th>
                        <th>{{ __('common.pay') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($products))

                        @foreach ($products as $product)
                            @php
                                $price = ($product[0]['price_promotion'] > 0) ? $product[0]['price_promotion'] : $product[0]['price'];
                                $total += $price * $product[0]['amount'];
                            @endphp

                            <tr class="rem" id="{{ $product[0]['id'] }}">
                                <td class="invert"></td>
                                <td class="invert-image">
                                    <a href="{{ route('site.product', ['slug' => $product[0]['slug']]) }}">
                                        <img src="{{ asset('/storage/projects/detail/'.$product[0]['url_image']) }}" alt="" class="img-responsive">
                                    </a>
                                </td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value amount-update" data-id-linked="{{ $product[0]['id'] }}">{{ $product[0]['amount'] }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="invert">{{ $product[0]['name'] }}</td>
        
                                <td class="invert">
                                    <h4>{{ formatCurrencyFrontEnd($product[0]['price']).' vnđ' }}</h4>
                                </td>
                                <td class="invert">
                                    <h4>{{ formatCurrencyFrontEnd($product[0]['price_promotion']).' vnđ' }}</h4>
                                </td>
                                <td class="invert">
                                    <h5 class="info">{{ formatCurrencyFrontEnd($price * $product[0]['amount']).' vnđ' }}</h5>
                                </td>
                            </tr>
                        @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><h4 class="total-price">{{ formatCurrencyFrontEnd($total) }} vnđ</h4></td>
                            </tr>
                    @else
                            <tr>
                                <td colspan="7">{{ __('common.no_cart') }}</td>
                            </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="checkout-left">
            <div class="checkout-left-basket">
                <a href="{{ route('payment') }}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>{{ __('common.back') }}</a>
            </div>
            <div class="checkout-right-basket">
                <a href="{{ route('confirm') }}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>{{ __('common.confirm') }}</a>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
@endsection

