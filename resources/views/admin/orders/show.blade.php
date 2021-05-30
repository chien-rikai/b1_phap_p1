@extends('layouts.master')

@section('title')
{{ __('common.title', [
    'model' => __('common.detail_order'),
    'module' => __('common.index')
]) }}
@endsection

@section('content')

<div class="card">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6" id="info-user">
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

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('common.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('common.detail_order') }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <h3 class="card-title">{{ __('common.products') }}</h3>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">

                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1"
                                            class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                                            aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1">
                                                        #
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.name', ['model' => __('common.product')]) }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.avatar') }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.amount') }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.price') }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.price_promotion') }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.payment') }}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!blank($detailOrders))
                                                    @foreach ($detailOrders as $key => $item)
                                                        @php
                                                            $payment = (($item->price_promotion > 0) ? $item->price_promotion : $item->price_base ) * $item->amount;
                                                            $totalPayment += $payment;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>{{ $item->product->name }}</td>
                                                            <td><img src="{{ ($item->product->url_image) ? asset('/storage/projects/avatar/'.$item->product->url_image) : asset('admin/default-product.jpg') }}"
                                                                alt="" style="width: 100px" height="100px">
                                                            </td>
                                                            <td>{{ $item->amount }}</td>
                                                            <td>{{ formatCurrencyFrontEnd($item->price_base) }} vnđ</td>
                                                            <td>{{ formatCurrencyFrontEnd($item->price_promotion) }}</td>
                                                            <td><span class="text-primary">{{ formatCurrencyFrontEnd($payment) }} vnđ</span></td>
                                                        </tr>
                                                    @endforeach
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><h3 class="text-danger">{{ formatCurrencyFrontEnd($totalPayment) }} vnđ</h3></td>
                                                        </tr>
                                                @else
                                                    <tr>
                                                        <td colspan="7">{{ __('table.no_data') }}</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example1_info" role="status"
                                            aria-live="polite">{{ __('pagination.total', ['total' => count($detailOrders)]) }}</div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ URL::previous() }}" class="btn btn-default">{{ __('common.back') }}</a>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>

@endsection

@section('script')
    @include('admin.scripts.order')
@endsection

