@extends('layouts.master')

@section('title')
Quản lý sản phẩm | Danh sách
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
                                    <h3 class="card-title">Danh sách sản phẩm</h3>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <a href="{{ route('products.create') }}" class="btn btn-info float-right">Thêm mới</a>
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
                                        <form method="GET" action="{{ route('products.index') }}">
                                            <div id="example1_filter" class="dataTables_filter">
                                                <label>Search:
                                                    <input type="search" name="name" product="{{ old('name') }}" class="form-control form-control-sm" placeholder=""
                                                        aria-controls="example1">
                                                </label>
                                                <button type="submit" class="btn btn-sm btn-default">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </form>
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
                                                        #</th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        Tên sản phẩm
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        Hình ảnh
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        Danh mục
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        Thông tin thêm
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        Thao tác
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!blank($products))
                                                    @foreach ($products as $key => $product)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>{{ $product->name }}</td>
                                                            <td><img src="{{ asset('/storage/projects/avatar/'.$product->url_image) }}" alt="" style="width: 100px" height="100px"></td>
                                                            <td>{{ $product->category->name }}</td>
                                                            <td>
                                                                <b>- Đơn giá :</b> {{ $product->price }}<br>
                                                                <b>- Giá khuyến mãi :</b> {{ $product->price_promotion }}<br>
                                                                <b>- Lượt xem :</b> {{ $product->view }}<br>
                                                                <b>- Điểm đánh giá :</b> {{ $product->star_rating }}<br>
                                                                <b>- Tình trạng kho :</b> {{ ($product->stock) ? $product->stock. ' sản phẩm' : 'Hết hàng' }}
                                                            </td>
                                                            <td>
                                                                <a href="{{route('products.edit',$product->id)}}"
                                                                    class="btn btn-success btn-sm float-left mr-1">
                                                                    Cập nhật
                                                                </a>

                                                                <form action="{{route('products.destroy',$product->id)}}"
                                                                    class="pull-left float-left"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger btn-icon"
                                                                            onclick="if(!confirm('Bạn có chắc chắn muốn xóa ?')){return false}">
                                                                        Xóa
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="3">Không có dữ liệu hiển thị</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example1_info" role="status"
                                            aria-live="polite">Hiện có {{ $products->total() }} mục</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                            {!! $products->appends(Request::all())->links('admin.helpers.paginate') !!}
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

@endsection
