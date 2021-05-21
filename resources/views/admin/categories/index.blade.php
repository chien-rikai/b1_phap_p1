@extends('layouts.master')

@section('title')
<<<<<<< HEAD
    {{ __('common.title', [
        'model' => __('common.category'),
        'module' => __('common.index')
    ]) }}
=======
Quản lý danh mục | Danh sách
>>>>>>> 96396aa (build_categories_admin_module)
@endsection

@section('boostrap')

@endsection

@section('content')

<div class="card">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
<<<<<<< HEAD
                    <h1>{{ __('common.index') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('common.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('common.index') }}</li>
=======
                    <h1>Danh sách</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh sách</li>
>>>>>>> 96396aa (build_categories_admin_module)
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
<<<<<<< HEAD
                                    <h3 class="card-title">
                                        {{ __('common.category') }}
                                    </h3>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <a href="{{ route('categories.create') }}" class="btn btn-info float-right">
                                        {{ __('common.store') }}
                                    </a>
=======
                                    <h3 class="card-title">Danh sách danh mục sản phẩm</h3>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <a href="{{ route('categories.create') }}" class="btn btn-info float-right">Thêm mới</a>
>>>>>>> 96396aa (build_categories_admin_module)
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
                                        <form method="GET" action="{{ route('categories.index') }}">
                                            <div id="example1_filter" class="dataTables_filter">
<<<<<<< HEAD
                                                <label>{{ __('common.search') }} :
=======
                                                <label>Search:
>>>>>>> 96396aa (build_categories_admin_module)
                                                    <input type="search" name="name" value="{{ old('name') }}" class="form-control form-control-sm" placeholder=""
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
<<<<<<< HEAD
                                                        {{ __('table.name', ['model' => __('common.category')]) }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.action') }}
=======
                                                        Tên Danh mục
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        Thao tác
>>>>>>> 96396aa (build_categories_admin_module)
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!blank($categories))
                                                    @foreach ($categories as $key => $category)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>{{ $category->name }}</td>
                                                            <td>
                                                                <a href="{{route('categories.edit',$category->id)}}"
                                                                    class="btn btn-success btn-sm float-left mr-1">
<<<<<<< HEAD
                                                                    {{ __('common.update') }}
=======
                                                                    Cập nhật
>>>>>>> 96396aa (build_categories_admin_module)
                                                                </a>

                                                                <form action="{{route('categories.destroy',$category->id)}}"
                                                                    class="pull-left float-left"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger btn-icon btn-delete">
<<<<<<< HEAD
                                                                        {{ __('common.destroy') }}
=======
                                                                        Xóa
>>>>>>> 96396aa (build_categories_admin_module)
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
<<<<<<< HEAD
                                                        <td colspan="3">{{ __('table.no_data') }}</td>
=======
                                                        <td colspan="3">Không có dữ liệu hiển thị</td>
>>>>>>> 96396aa (build_categories_admin_module)
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example1_info" role="status"
<<<<<<< HEAD
                                            aria-live="polite">{{ __('pagination.total', ['total' => $categories->total()]) }}</div>
=======
                                            aria-live="polite">Hiện có {{ $categories->total() }} mục</div>
>>>>>>> 96396aa (build_categories_admin_module)
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                            {!! $categories->appends(Request::all())->links('admin.helpers.paginate') !!}
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
