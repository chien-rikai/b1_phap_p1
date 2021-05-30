<h1>{{ __('common.order_of_customer') }} : {{ $order->name }}</h1>
<h5>{{ __('common.order_phone') }} : {{ $order->phone }}</h5>
<h5>{{ __('common.order_email') }} : {{ $order->email }}</h5>
<h5>{{ __('common.order_address') }} : {{ $order->address }}</h5>
<h5>{{ __('common.order_status') }} : 
    <span class="text-primary">{{ __('common.'.config('global.status_order.'.$order->status)) }}</span>
    @if ((int) $order->status < 4)
        <span><a href="#" id="order-status" class="btn btn-danger btn-sm">{{ __('common.forward') }}</a></span>
    @endif
</h5>
<h5>{{ __('common.date_order'). ' : ' .fortmatDateFrontend($order->created_at) }}</h5>
<h5>{{ __('common.date_order_end'). ' : ' .fortmatDateFrontend($order->date_order_end) }}</h5>
<h5>{{ __('common.date_take_money'). ' : ' .fortmatDateFrontend($order->date_take_money) }}</h5>

@include('admin.scripts.order')