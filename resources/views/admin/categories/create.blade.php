@extends('layouts.master')

@section('title')
Quản lý danh mục | Thêm mới
@endsection

@section('boostrap')

@endsection

@section('content')

<div class="card">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm mới</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm mới</li>
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
                            <h3 class="card-title">Thêm mới danh mục sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('categories.store') }}" method="POST">
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    @csrf

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Tên danh mục</label>
                                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}"
                                                    name="name" value="{{ old('name') }}" id="name" placeholder="Tên danh mục">
                                                @if ($errors->has('name'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{ route('categories.index') }}" class="btn btn-default">Quay về</a>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
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
