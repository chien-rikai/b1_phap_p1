@extends('layouts.master')

@section('title')
<<<<<<< HEAD
{{ __('common.title', [
    'model' => __('common.user'),
    'module' => __('common.index')
]) }}
=======
Quản lý quản trị viên | Danh sách
>>>>>>> b9956af (build_users_admin_module)
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
>>>>>>> b9956af (build_users_admin_module)
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
                                        {{ __('common.user') }}
                                    </h3>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <a href="{{ route('users.create') }}" class="btn btn-info float-right">
                                        {{ __('common.store') }}
                                    </a>
=======
                                    <h3 class="card-title">Danh sách quản trị viên</h3>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <a href="{{ route('users.create') }}" class="btn btn-info float-right">Thêm mới</a>
>>>>>>> b9956af (build_users_admin_module)
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
                                        <form method="GET" action="{{ route('users.index') }}">
                                            <div id="example1_filter" class="dataTables_filter">
<<<<<<< HEAD
                                                <label>{{ __('common.search') }} :
=======
                                                <label>Search:
>>>>>>> b9956af (build_users_admin_module)
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
                                                        {{ __('table.name', ['model' => __('common.user')]) }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.avatar') }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.email') }}
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ __('table.action') }}
=======
                                                        Tên quản trị viên
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        Ảnh đại diện
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        Tên Email
                                                    </th>
                                                    <th class="" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        Thao tác
>>>>>>> b9956af (build_users_admin_module)
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!blank($users))
                                                    @foreach ($users as $key => $user)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>{{ $user->name }}</td>
                                                            <td><img src="{{ ($user->url_image) ? asset('/storage/users/avatar/'.$user->url_image) : asset('admin/default-user.jpg') }}"
                                                                alt="" style="width: 100px" height="100px">
                                                            </td>
                                                            <td>{{ $user->email }}</td>

                                                            <td>
                                                                <a href="{{route('users.edit',$user->id)}}"
                                                                    class="btn btn-success btn-sm float-left mr-1">
<<<<<<< HEAD
                                                                    {{ __('common.update') }}
=======
                                                                    Cập nhật
>>>>>>> b9956af (build_users_admin_module)
                                                                </a>

                                                                <a href="{{route('user.view.change.pass',$user->id)}}"
                                                                    class="btn btn-info btn-sm float-left mr-1">
<<<<<<< HEAD
                                                                    {{ __('common.change_password') }}
=======
                                                                    Đổi mật khẩu
>>>>>>> b9956af (build_users_admin_module)
                                                                </a>

                                                                <form action="{{route('users.destroy',$user->id)}}"
                                                                    class="pull-left float-left"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
<<<<<<< HEAD
                                                                    <button type="submit" class="btn btn-sm btn-danger btn-icon btn-delete">
                                                                        {{ __('common.destroy') }}
=======
                                                                    <button type="submit" class="btn btn-sm btn-danger btn-icon"
                                                                            onclick="if(!confirm('Bạn có chắc chắn muốn xóa ?')){return false}">
                                                                        Xóa
>>>>>>> b9956af (build_users_admin_module)
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
>>>>>>> b9956af (build_users_admin_module)
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
                                            aria-live="polite">{{ __('pagination.total', ['total' => $users->total()]) }}</div>
=======
                                            aria-live="polite">Hiện có {{ $users->total() }} mục</div>
>>>>>>> b9956af (build_users_admin_module)
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                            {!! $users->appends(Request::all())->links('admin.helpers.paginate') !!}
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
