@extends('layouts.master')

@section('title')
<<<<<<< HEAD
{{ __('common.title', [
    'model' => __('common.product'),
    'module' => __('common.store')
]) }}
=======
Quản lý sản phẩm | Thêm mới
@endsection

@section('boostrap')

>>>>>>> a8af8ee (build_product_admin_module)
@endsection

@section('content')

<div class="card">
<<<<<<< HEAD
    {{ loadContentHeader(['action' => __('common.store'), 'home' => __('common.home')]) }}
=======
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
>>>>>>> a8af8ee (build_product_admin_module)

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card">
                        <div class="card-header">
<<<<<<< HEAD
                            <h3 class="card-title">
                                {{ __('common.store').' '.__('common.product') }}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        @include('layouts.form.products.create')
=======
                            <h3 class="card-title">Thêm mới sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    @csrf

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">Tên sản phẩm {!!'<span class="required-alert">*</span>'!!}</label>
                                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}"
                                                    name="name" value="{{ old('name') }}" id="name" placeholder="Tên sản phẩm">
                                                @if ($errors->has('name'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        @php
                                            $data = [
                                                'categories' => $categories,
                                                'col' => 6,
                                                'required' => true,
                                            ];
                                        @endphp

                                        @include('admin.helpers.selected.categories', $data)
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">Đơn giá {!!'<span class="required-alert">*</span>'!!}</label>
                                                <input type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : ''}}"
                                                    name="price" value="{{ old('price') }}" id="name" placeholder="">
                                                @if ($errors->has('price'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('price') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">Giá khuyến mãi</label>
                                                <input type="text" class="form-control {{ $errors->has('price_promotion') ? 'is-invalid' : ''}}"
                                                    name="price_promotion" value="{{ old('price_promotion') }}" id="name" placeholder="">
                                                @if ($errors->has('price_promotion'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('price_promotion') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Mô tả</label>
                                                <textarea type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}"
                                                    name="description" value="{{ old('description') }}" id="description"
                                                    >{{ old('description') }}
                                                </textarea>
                                                @if ($errors->has('description'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('description') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">Hình ảnh {!!'<span class="required-alert">*</span>'!!}</label>
                                                <input type="file" class="form-control {{ $errors->has('url_image') ? 'is-invalid' : ''}}"
                                                    name="url_image" value="{{ old('url_image') }}" id="name" placeholder="">
                                                @if ($errors->has('url_image'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('url_image') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer">
                                <a href="{{ route('products.index') }}" class="btn btn-default">Quay về</a>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
>>>>>>> a8af8ee (build_product_admin_module)
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

<div class="card">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
                <div class="col-sm-6">

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
<<<<<<< HEAD
                            <h3 class="card-title">Upload {{ __('common.index').' '.__('common.product') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        @include('layouts.form.products.import')
=======
                            <h3 class="card-title">Upload danh sách sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    @csrf

                                    @if(session()->has('failures'))
                                        <ul class="alert alert-danger">
                                            @foreach(session()->get('failures') as $error)
                                                <li>{{ "[" . "\"".$error->values()[$error->attribute()]."\"" . "] " . $error->errors()[0] }}</li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">File upload {!!'<span class="required-alert">*</span>'!!}</label>
                                                <input type="file" class="form-control {{ $errors->has('upload') ? 'is-invalid' : ''}}"
                                                    name="upload" value="{{ old('upload') }}" id="name">

                                                @if ($errors->has('upload'))
                                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">{{ $errors->first('upload') }}</span>
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
>>>>>>> a8af8ee (build_product_admin_module)
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
<<<<<<< HEAD
=======

@section('script')

@endsection
>>>>>>> a8af8ee (build_product_admin_module)
