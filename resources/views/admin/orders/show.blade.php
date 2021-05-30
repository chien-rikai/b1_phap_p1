@extends('layouts.master')

@section('title')
Chi tiết đơn hàng | Danh sách
@endsection

@section('boostrap')

@endsection

@section('content')

<div class="card">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Đơn hàng : {{ $order->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
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
                                    <h3 class="card-title">Chi tiết đơn hàng</h3>
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
                                                        Tên sản phẩm
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        Hình đại diện
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        Số lượng
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        Đơn giá
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        Giá khuyến mãi
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        Thanh toán
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
                                                        <td colspan="5">Không có dữ liệu hiển thị</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example1_info" role="status"
                                            aria-live="polite">Hiện có {{ count($detailOrders) }} mục</div>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ route('orders.index') }}" class="btn btn-default">Quay về</a>
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

@endsection
