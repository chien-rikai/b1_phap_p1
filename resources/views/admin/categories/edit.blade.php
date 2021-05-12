@extends('layouts.master')

@section('title')
    Quản lý danh mục | Cập nhật
@endsection

@section('css')

@endsection

@section('content')

<div class="card">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cập nhật</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Cập nhật</li>
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
                            <h3 class="card-title">Cập nhật danh mục sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('categories.update', $category->id) }}" method="POST">
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    @csrf
                                    @method("PUT")

                                    <input hidden name="id" value="{{ $category->id }}">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Tên danh mục</label>
                                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}"
                                                    name="name" value="{{ old('name', $category->name) }}" id="name" placeholder="Tên danh mục">
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
