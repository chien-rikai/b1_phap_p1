@extends('layouts.master')

@section('title')
Quản lý đơn hàng | Danh sách
@endsection

@section('boostrap')

@endsection

@section('content')

<div class="card">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh sách</li>
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
                                    <h3 class="card-title">Tìm kiếm</h3>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('orders.index') }}" method="GET">
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="name">Tên khách hàng </label>
                                                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}"
                                                        name="name" value="{{ old('name') }}" id="name">
                                                   
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="name">Email </label>
                                                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}"
                                                        name="email" value="{{ old('email') }}" id="name" >
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="name">Số điện thoại </label>
                                                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}"
                                                        name="phone" value="{{ old('phone') }}" id="name">
                                                    @if ($errors->has('phone'))
                                                        <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="name">Trạng thái đơn hàng </label>
                                                <select class="custom-select" name="status">
                                                    <option selected value="">Mặc định</option>
                                                    @foreach (config('constraint.order_status') as $item)
                                                        <option value="{{ $item['value'] }}" {{ ($item['value'] == old('status')) ? 'selected' : '' }}>{{ $item['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <h3 class="card-title">Danh sách sản phẩm</h3>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">

                                    </div>
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
                                                        Tên khách hàng
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        Email
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        SĐT
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        Địa chỉ
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        Trạng thái
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        Thao tác
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!blank($orders))
                                                    @foreach ($orders as $key => $order)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>{{ $order->name }}</td>
                                                            <td>{{ $order->email }}</td>
                                                            <td>{{ $order->phone }}</td>
                                                            <td>{{ $order->address }}</td>
                                                            <td>
                                                                <select name="status" class="order-status" data-order-id="{{ $order->id }}">
                                                                    @foreach (config('constraint.order_status') as $item)
                                                                        <option value="{{ $item['value'] }}" {{ ($item['value'] == $order->status) ? 'selected' : '' }}>{{ $item['name'] }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <a href="{{route('orders.show', $order->id)}}"
                                                                    class="btn btn-info btn-sm float-left mr-1">
                                                                    Xem chi tiết
                                                                </a>

                                                                <form action="{{route('orders.destroy',$order->id)}}"
                                                                    class="pull-left float-left"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger btn-icon btn-delete">
                                                                        Hủy đơn hàng
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="6">Không có dữ liệu hiển thị</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example1_info" role="status"
                                            aria-live="polite">Hiện có {{ $orders->total() }} mục</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                            {!! $orders->appends(Request::all())->links('admin.helpers.paginate') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
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
<script>
    $('.order-status').on('change', function () {
        var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            type: 'POST',
            data: {
                id: $(this).data('order-id'),
                status: $(this).val()
            },
            dataType: 'json',
            cache: false,
            url: "{{ route('order.status.update') }}",
            success: function (res) {
               if (res == 1) {
                Toast.fire({
                    icon: 'success',
                    title: "Cập nhật trạng thái thành công !",
                }).show();
               }
            },
            error: function (error) {
                Toast.fire({
                    icon: 'error',
                    title: "Có lỗi phát sinh. Vui lòng thử lại !",
                }).show();
            }
        });
    });
</script>
@endsection
