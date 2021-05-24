@extends('site.layouts.master')

@section('title')
SupperMarket | Giỏ hàng
@endsection

@section('bootstrap')
<style>
    .info {
        color: #0174DF;
    }

    .total-price {
        color:  #FF0000;
    }
</style>
@endsection

@section('content')
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Singlepage</li>
        </ol>
    </div>
</div>

<div class="checkout">
    <div class="container">
        <h2>Giỏ hàng của bạn hiện tại có : <span><span id="count-products">{{ count($products) }}</span> sản phẩm</span></h2>
        <div class="checkout-right">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                        <th>Lấy ra</th>
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
                <h4><a href="" id="update-cart">Cập nhật giỏ hàng</a></h4>
                {{-- <ul>
                    <li>Product1 <i>-</i> <span>$15.00 </span></li>
                    <li>Product2 <i>-</i> <span>$25.00 </span></li>
                    <li>Product3 <i>-</i> <span>$29.00 </span></li>
                    <li>Total Service Charges <i>-</i> <span>$15.00</span></li>
                    <li>Total <i>-</i> <span>$84.00</span></li>
                </ul> --}}
            </div>
            <div class="checkout-right-basket">
                <a href="single.html"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Thanh toán</a>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<!--quantity-->
<script>
    $('.close1').on('click', function (e) {
        var id = $(this).data('id');
        var url = '/ajax/remove-out-cart/'+id;

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            type: 'GET',
            data: {
               id: id
            },
            dataType: 'json',
            cache: false,
            url: url,
            success: function (res) {
                if (res > 0) {
                    $('#'+id).fadeOut('slow', function () {
                        $('#'+id).remove();
                    });
            
                    $("#count-products").text($("#count-products").text() - 1);
                }
            },

            error: function (error) {
                alert("Có lỗi xảy ra");
            }
        });
    });

    $('#update-cart').on('click', function (e) {
        e.preventDefault();

        const cart = new Array();

        $(".amount-update").each(function () {
            cart[$(this).data('id-linked')] = $(this).text();
        });
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            type: 'POST',
            data: {
                cart
            },
            dataType: 'json',
            cache: false,
            url: "{{ route('update.cart') }}",
            success: function (res) {
                if (res > 0) {
                    location.reload();
                }
            },

            error: function (error) {
                alert("Có lỗi xảy ra");
            }
        });
    });

    $('.value-plus').on('click', function () {
        var divUpd = $(this).parent().find('.value'),
            newVal = parseInt(divUpd.text(), 10) + 1;
        divUpd.text(newVal);
    });

    $('.value-minus').on('click', function () {
        var divUpd = $(this).parent().find('.value'),
            newVal = parseInt(divUpd.text(), 10) - 1;
        if (newVal >= 1) divUpd.text(newVal);
    });

</script>
<!--quantity-->
@endsection
