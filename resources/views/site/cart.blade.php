@extends('site.layouts.master')

@section('title')
SupperMarket | {{ __('common.cart') }}
@endsection

@section('content')
{{ loadBreadCrumbs() }}

<div class="checkout">
    <div class="container">
        <h2>{{ __('common.count_cart') }} <span><span id="count-products">{{ count($products) }}</span> {{ __('common.product') }}</span></h2>
        <div class="checkout-right">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>{{ __('common.product') }}</th>
                        <th>{{ __('common.amount') }}</th>
                        <th>{{ __('common.name', ['name' => __('common.product')]) }}</th>
                        <th>{{ __('common.price') }}</th>
                        <th>{{ __('common.pay') }}</th>
                        <th>{{ __('common.take_out') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($products))

                        @foreach ($products as $product)
                            @php
                                $price = ($product[0]['price_promotion'] === 0) ? $product[0]['price_promotion'] : $product[0]['price'];
                                $total += $price * $product[0]['amount'];
                            @endphp

                            <tr class="rem" id="{{ $product[0]['id'] }}">
                                <td class="invert"></td>
                                <td class="invert-image">
                                    <a href="">
                                        <img src="{{ asset('/storage/projects/detail/'.$product[0]['url_image']) }}" alt="" class="img-responsive">
                                    </a>
                                </td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value-minus">&nbsp;</div>
                                            <div class="entry value amount-update" data-id-linked="{{ $product[0]['id'] }}">{{ $product[0]['amount'] }}</div>
                                            <div class="entry value-plus active">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="invert">{{ $product[0]['name'] }}</td>
        
                                <td class="invert">
                                    {!! ($product[0]['price_promotion'] === 0) ? '<h4>'.formatCurrencyFrontEnd($product[0]['price_promotion']).' vnđ<span>'.formatCurrencyFrontEnd($product[0]['price']).' vnđ</span></h4>' : '<h4>'.formatCurrencyFrontEnd($product[0]['price']).' vnđ</h4>' !!}
                                </td>
                                <td class="invert">
                                    <h5 class="info">{{ formatCurrencyFrontEnd($price * $product[0]['amount']).' vnđ' }}</h5>
                                </td>
                                <td class="invert">
                                    <div class="rem">
                                        <div class="close1" data-id="{{ $product[0]['id'] }}"></div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><h4 class="total-price">{{ formatCurrencyFrontEnd($total) }} vnđ</h4></td>
                                <td></td>
                            </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="checkout-left">
            <div class="checkout-left-basket">
                <h4><a href="" id="update-cart">{{ __('common.update_to_cart') }}</a></h4>
            </div>
            <div class="checkout-right-basket">
                <a href="{{ route('payment') }}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>{{ __('common.payment') }}</a>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
@endsection

